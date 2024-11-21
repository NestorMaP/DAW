export function createTimer(ms) {
  return new Promise((resolve, reject) => {
    let primaryTimer = setTimeout(() => {
      resolve('Time concluded!');
    }, ms);

    let rejectTimer = setTimeout(() => {
      clearTimeout(primaryTimer);
      reject('The time is not correct...');
    }, ms * 2);
  });
}

export async function count(
  beginning,
  element = document.body,
  interval = 1000,
  callback = null
) {
  for (let i = beginning; i >= 0; i--) {
    let paragraph = document.createElement('p');
    paragraph.textContent = i;
    element.appendChild(paragraph);

    try {
      await createTimer(interval);
    } catch (e) {
      console.error(e);
      break;
    }
  }
  if (callback) {
    callback();
  }
}
