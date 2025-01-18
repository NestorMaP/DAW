const startBtn = document.getElementById('start');
const stopBtn = document.getElementById('stop');
const downloadLink = document.getElementById('download');
const preview = document.getElementById('preview');

let mediaRecorder;
let recordedChunks = [];

startBtn.addEventListener('click', async () => {
  const stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: true });
  preview.scrObject = stream;

  mediaRecorder = new MediaRecorder(stream);
  mediaRecorder.ondataavailable = (e) => recordedChunks.push(e.data);
  
  mediaRecorder.start();
  startBtn.disabled = true;
  stopBtn.diabled = false;
});

stopBtn.addEventListener('click', () => {
  mediaRecorder.stop();
  preview.srcObject.getTracks().forEach(track => track.stop());
  stopBtn.disabled = true;
  startBtn.disabled = false;

  const blob = new Blob(recordedChunks, { type: 'video/webm' });
  recordedChunks = [];
  downloadLink.href = URL.createObjectURL(blob);
});