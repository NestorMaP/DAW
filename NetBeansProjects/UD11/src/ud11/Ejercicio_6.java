/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/GUIForms/JFrame.java to edit this template
 */
package ud11;

/**
 *
 * @author nesxr
 */
public class Ejercicio_6 extends javax.swing.JFrame {

    /**
     * Creates new form Ejercicio_6
     */
    public Ejercicio_6() {
        initComponents();
        this.setTitle("Dados de Rol");
        this.setLocation(1500,600);
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jPanel1 = new javax.swing.JPanel();
        jButtonD6 = new javax.swing.JButton();
        jButtonD8 = new javax.swing.JButton();
        jButtonD10 = new javax.swing.JButton();
        jButtonD20 = new javax.swing.JButton();
        jButtonD12 = new javax.swing.JButton();
        jLabelResult = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);

        jButtonD6.setIcon(new javax.swing.ImageIcon("C:\\Users\\nesxr\\Documents\\GitHub\\DAW\\NetBeansProjects\\UD11\\assets\\dices\\d6.jpeg")); // NOI18N
        jButtonD6.setCursor(new java.awt.Cursor(java.awt.Cursor.DEFAULT_CURSOR));
        jButtonD6.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jButtonD6.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButtonD6ActionPerformed(evt);
            }
        });

        jButtonD8.setIcon(new javax.swing.ImageIcon("C:\\Users\\nesxr\\Documents\\GitHub\\DAW\\NetBeansProjects\\UD11\\assets\\dices\\d8.png")); // NOI18N
        jButtonD8.setBorder(null);
        jButtonD8.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jButtonD8.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButtonD8ActionPerformed(evt);
            }
        });

        jButtonD10.setIcon(new javax.swing.ImageIcon("C:\\Users\\nesxr\\Documents\\GitHub\\DAW\\NetBeansProjects\\UD11\\assets\\dices\\d10.jpg")); // NOI18N
        jButtonD10.setBorder(null);
        jButtonD10.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jButtonD10.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButtonD10ActionPerformed(evt);
            }
        });

        jButtonD20.setIcon(new javax.swing.ImageIcon("C:\\Users\\nesxr\\Documents\\GitHub\\DAW\\NetBeansProjects\\UD11\\assets\\dices\\d20.png")); // NOI18N
        jButtonD20.setBorder(null);
        jButtonD20.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jButtonD20.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButtonD20ActionPerformed(evt);
            }
        });

        jButtonD12.setIcon(new javax.swing.ImageIcon("C:\\Users\\nesxr\\Documents\\GitHub\\DAW\\NetBeansProjects\\UD11\\assets\\dices\\d12.jpeg")); // NOI18N
        jButtonD12.setBorder(null);
        jButtonD12.setHorizontalTextPosition(javax.swing.SwingConstants.CENTER);
        jButtonD12.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButtonD12ActionPerformed(evt);
            }
        });

        jLabelResult.setFont(new java.awt.Font("Segoe UI", 1, 18)); // NOI18N
        jLabelResult.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabelResult.setBorder(new javax.swing.border.SoftBevelBorder(javax.swing.border.BevelBorder.RAISED));

        javax.swing.GroupLayout jPanel1Layout = new javax.swing.GroupLayout(jPanel1);
        jPanel1.setLayout(jPanel1Layout);
        jPanel1Layout.setHorizontalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGap(50, 50, 50)
                        .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.CENTER)
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(jButtonD6, javax.swing.GroupLayout.PREFERRED_SIZE, 73, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(28, 28, 28)
                                .addComponent(jButtonD8, javax.swing.GroupLayout.PREFERRED_SIZE, 80, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(29, 29, 29)
                                .addComponent(jButtonD10))
                            .addGroup(jPanel1Layout.createSequentialGroup()
                                .addComponent(jButtonD12, javax.swing.GroupLayout.PREFERRED_SIZE, 80, javax.swing.GroupLayout.PREFERRED_SIZE)
                                .addGap(34, 34, 34)
                                .addComponent(jButtonD20, javax.swing.GroupLayout.PREFERRED_SIZE, 80, javax.swing.GroupLayout.PREFERRED_SIZE))))
                    .addGroup(jPanel1Layout.createSequentialGroup()
                        .addGap(161, 161, 161)
                        .addComponent(jLabelResult, javax.swing.GroupLayout.PREFERRED_SIZE, 72, javax.swing.GroupLayout.PREFERRED_SIZE)))
                .addContainerGap(60, Short.MAX_VALUE))
        );
        jPanel1Layout.setVerticalGroup(
            jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanel1Layout.createSequentialGroup()
                .addGap(29, 29, 29)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jButtonD8)
                    .addComponent(jButtonD10, javax.swing.GroupLayout.PREFERRED_SIZE, 80, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jButtonD6, javax.swing.GroupLayout.PREFERRED_SIZE, 80, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jPanel1Layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jButtonD12, javax.swing.GroupLayout.PREFERRED_SIZE, 80, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jButtonD20, javax.swing.GroupLayout.PREFERRED_SIZE, 80, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addComponent(jLabelResult, javax.swing.GroupLayout.DEFAULT_SIZE, 57, Short.MAX_VALUE)
                .addContainerGap())
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jPanel1, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jPanel1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jButtonD6ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButtonD6ActionPerformed
        // TODO add your handling code here:
        jLabelResult.setText(random(1,6));
    }//GEN-LAST:event_jButtonD6ActionPerformed

    private void jButtonD8ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButtonD8ActionPerformed
        // TODO add your handling code here:
        jLabelResult.setText(random(1,8));
    }//GEN-LAST:event_jButtonD8ActionPerformed

    private void jButtonD10ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButtonD10ActionPerformed
        // TODO add your handling code here:
        jLabelResult.setText(random(1,10));
    }//GEN-LAST:event_jButtonD10ActionPerformed

    private void jButtonD12ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButtonD12ActionPerformed
        // TODO add your handling code here:
        jLabelResult.setText(random(1,12));
    }//GEN-LAST:event_jButtonD12ActionPerformed

    private void jButtonD20ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButtonD20ActionPerformed
        // TODO add your handling code here:
        jLabelResult.setText(random(1,20));
    }//GEN-LAST:event_jButtonD20ActionPerformed

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(Ejercicio_6.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(Ejercicio_6.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(Ejercicio_6.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(Ejercicio_6.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new Ejercicio_6().setVisible(true);
            }
        });
    }
    public String random(int min, int max) {
        int number = (int)(Math.random()*(max-min+1)+min);
        return String.valueOf(number);
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton jButtonD10;
    private javax.swing.JButton jButtonD12;
    private javax.swing.JButton jButtonD20;
    private javax.swing.JButton jButtonD6;
    private javax.swing.JButton jButtonD8;
    private javax.swing.JLabel jLabelResult;
    private javax.swing.JPanel jPanel1;
    // End of variables declaration//GEN-END:variables
}
