
import java.sql.ResultSet;
import java.sql.SQLException;
import javax.swing.JOptionPane;

public class GestionClientesIGU extends javax.swing.JFrame {

    private ResultSet rsClientes;
    private boolean clienteValido = false;

    public GestionClientesIGU() {

        // Inicilización de componentes gráficos
        initComponents();

        // Cargamos driver y conectamos con la BD
        DBManager.loadDriver();
        DBManager.connect();

        // Obtenemos el ResultSet de clientes y mostramos el primero
        obtenerClientes();
        muestraClientePrimero();
    }

    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    @SuppressWarnings("unchecked")
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jfNuevoCliente = new javax.swing.JFrame();
        lblVNCTitulo = new javax.swing.JLabel();
        jpVNC = new javax.swing.JPanel();
        lblVNCNombre = new javax.swing.JLabel();
        txtVNCNombre = new javax.swing.JTextField();
        lblVNCDireccion = new javax.swing.JLabel();
        txtVNCDireccion = new javax.swing.JTextField();
        btnVNCAceptar = new javax.swing.JButton();
        btnVNCCancelar = new javax.swing.JButton();
        jfEditarCliente = new javax.swing.JFrame();
        lblVECTitulo = new javax.swing.JLabel();
        jpVEC = new javax.swing.JPanel();
        lblVECId = new javax.swing.JLabel();
        lblVECIdCliente = new javax.swing.JLabel();
        lblVECNombre = new javax.swing.JLabel();
        txtVECNombre = new javax.swing.JTextField();
        lblVECDireccion = new javax.swing.JLabel();
        txtVECDireccion = new javax.swing.JTextField();
        btnVECAceptar = new javax.swing.JButton();
        btnVECCancelar = new javax.swing.JButton();
        jPanelVP = new javax.swing.JPanel();
        lblTitulo = new javax.swing.JLabel();
        btnPrimero = new javax.swing.JButton();
        btnAnterior = new javax.swing.JButton();
        btnSiguiente = new javax.swing.JButton();
        btnUltimo = new javax.swing.JButton();
        lblId = new javax.swing.JLabel();
        lblIdCliente = new javax.swing.JLabel();
        lblNombre = new javax.swing.JLabel();
        lblNombreCliente = new javax.swing.JLabel();
        lblDireccion = new javax.swing.JLabel();
        lblDireccionCliente = new javax.swing.JLabel();
        btnNuevo = new javax.swing.JButton();
        btnEditar = new javax.swing.JButton();
        btnEliminar = new javax.swing.JButton();

        jfNuevoCliente.setDefaultCloseOperation(javax.swing.WindowConstants.DO_NOTHING_ON_CLOSE);
        jfNuevoCliente.setResizable(false);
        jfNuevoCliente.setSize(new java.awt.Dimension(262, 185));

        lblVNCTitulo.setFont(new java.awt.Font("Tahoma", 0, 18)); // NOI18N
        lblVNCTitulo.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        lblVNCTitulo.setText("Nuevo Cliente");

        lblVNCNombre.setFont(new java.awt.Font("Noto Sans", 1, 12)); // NOI18N
        lblVNCNombre.setText("Nombre:");

        lblVNCDireccion.setFont(new java.awt.Font("Noto Sans", 1, 12)); // NOI18N
        lblVNCDireccion.setText("Direccion:");

        btnVNCAceptar.setText("Aceptar");
        btnVNCAceptar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnVNCAceptarActionPerformed(evt);
            }
        });

        btnVNCCancelar.setText("Cancelar");
        btnVNCCancelar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnVNCCancelarActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jpVNCLayout = new javax.swing.GroupLayout(jpVNC);
        jpVNC.setLayout(jpVNCLayout);
        jpVNCLayout.setHorizontalGroup(
            jpVNCLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpVNCLayout.createSequentialGroup()
                .addGroup(jpVNCLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lblVNCNombre)
                    .addComponent(lblVNCDireccion))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jpVNCLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(txtVNCNombre)
                    .addComponent(txtVNCDireccion)))
            .addGroup(jpVNCLayout.createSequentialGroup()
                .addGap(41, 41, 41)
                .addComponent(btnVNCAceptar)
                .addGap(18, 18, 18)
                .addComponent(btnVNCCancelar)
                .addContainerGap(61, Short.MAX_VALUE))
        );
        jpVNCLayout.setVerticalGroup(
            jpVNCLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpVNCLayout.createSequentialGroup()
                .addGroup(jpVNCLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lblVNCNombre)
                    .addComponent(txtVNCNombre, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jpVNCLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lblVNCDireccion)
                    .addComponent(txtVNCDireccion, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addGap(18, 18, 18)
                .addGroup(jpVNCLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(btnVNCAceptar)
                    .addComponent(btnVNCCancelar))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout jfNuevoClienteLayout = new javax.swing.GroupLayout(jfNuevoCliente.getContentPane());
        jfNuevoCliente.getContentPane().setLayout(jfNuevoClienteLayout);
        jfNuevoClienteLayout.setHorizontalGroup(
            jfNuevoClienteLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jfNuevoClienteLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jfNuevoClienteLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jpVNC, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(lblVNCTitulo, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addContainerGap())
        );
        jfNuevoClienteLayout.setVerticalGroup(
            jfNuevoClienteLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jfNuevoClienteLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(lblVNCTitulo, javax.swing.GroupLayout.PREFERRED_SIZE, 34, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addComponent(jpVNC, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap())
        );

        jfEditarCliente.setDefaultCloseOperation(javax.swing.WindowConstants.DO_NOTHING_ON_CLOSE);
        jfEditarCliente.setResizable(false);
        jfEditarCliente.setSize(new java.awt.Dimension(262, 214));

        lblVECTitulo.setFont(new java.awt.Font("Tahoma", 0, 18)); // NOI18N
        lblVECTitulo.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        lblVECTitulo.setText("Editar Cliente");

        lblVECId.setFont(new java.awt.Font("Noto Sans", 1, 12)); // NOI18N
        lblVECId.setText("ID:");

        lblVECIdCliente.setText("     ");

        lblVECNombre.setFont(new java.awt.Font("Noto Sans", 1, 12)); // NOI18N
        lblVECNombre.setText("Nombre:");

        lblVECDireccion.setFont(new java.awt.Font("Noto Sans", 1, 12)); // NOI18N
        lblVECDireccion.setText("Direccion:");

        btnVECAceptar.setText("Aceptar");
        btnVECAceptar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnVECAceptarActionPerformed(evt);
            }
        });

        btnVECCancelar.setText("Cancelar");
        btnVECCancelar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnVECCancelarActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jpVECLayout = new javax.swing.GroupLayout(jpVEC);
        jpVEC.setLayout(jpVECLayout);
        jpVECLayout.setHorizontalGroup(
            jpVECLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpVECLayout.createSequentialGroup()
                .addGap(41, 41, 41)
                .addComponent(btnVECAceptar)
                .addGap(18, 18, 18)
                .addComponent(btnVECCancelar)
                .addContainerGap(61, Short.MAX_VALUE))
            .addGroup(jpVECLayout.createSequentialGroup()
                .addGroup(jpVECLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(lblVECDireccion)
                    .addComponent(lblVECNombre)
                    .addComponent(lblVECId))
                .addGap(6, 6, 6)
                .addGroup(jpVECLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jpVECLayout.createSequentialGroup()
                        .addComponent(lblVECIdCliente)
                        .addGap(0, 0, Short.MAX_VALUE))
                    .addComponent(txtVECNombre)
                    .addComponent(txtVECDireccion)))
        );
        jpVECLayout.setVerticalGroup(
            jpVECLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jpVECLayout.createSequentialGroup()
                .addGroup(jpVECLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lblVECId)
                    .addComponent(lblVECIdCliente))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jpVECLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lblVECNombre)
                    .addComponent(txtVECNombre, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jpVECLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lblVECDireccion)
                    .addComponent(txtVECDireccion, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jpVECLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(btnVECAceptar)
                    .addComponent(btnVECCancelar))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout jfEditarClienteLayout = new javax.swing.GroupLayout(jfEditarCliente.getContentPane());
        jfEditarCliente.getContentPane().setLayout(jfEditarClienteLayout);
        jfEditarClienteLayout.setHorizontalGroup(
            jfEditarClienteLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jfEditarClienteLayout.createSequentialGroup()
                .addContainerGap()
                .addGroup(jfEditarClienteLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addComponent(jpVEC, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(lblVECTitulo, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addContainerGap())
        );
        jfEditarClienteLayout.setVerticalGroup(
            jfEditarClienteLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, jfEditarClienteLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(lblVECTitulo, javax.swing.GroupLayout.PREFERRED_SIZE, 34, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jpVEC, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );

        setDefaultCloseOperation(javax.swing.WindowConstants.EXIT_ON_CLOSE);
        setResizable(false);
        addWindowListener(new java.awt.event.WindowAdapter() {
            public void windowClosed(java.awt.event.WindowEvent evt) {
                formWindowClosed(evt);
            }
        });

        lblTitulo.setFont(new java.awt.Font("Tahoma", 0, 36)); // NOI18N
        lblTitulo.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        lblTitulo.setText("Gestor de clientes");

        btnPrimero.setText("|<");
        btnPrimero.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnPrimeroActionPerformed(evt);
            }
        });

        btnAnterior.setText("<<");
        btnAnterior.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnAnteriorActionPerformed(evt);
            }
        });

        btnSiguiente.setText(">>");
        btnSiguiente.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnSiguienteActionPerformed(evt);
            }
        });

        btnUltimo.setText(">|");
        btnUltimo.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnUltimoActionPerformed(evt);
            }
        });

        lblId.setFont(new java.awt.Font("Noto Sans", 1, 12)); // NOI18N
        lblId.setText("ID:");

        lblIdCliente.setText("     ");

        lblNombre.setFont(new java.awt.Font("Noto Sans", 1, 12)); // NOI18N
        lblNombre.setText("Nombre:");

        lblNombreCliente.setText("     ");

        lblDireccion.setFont(new java.awt.Font("Noto Sans", 1, 12)); // NOI18N
        lblDireccion.setText("Dirección:");

        lblDireccionCliente.setText("     ");

        btnNuevo.setText("NUEVO");
        btnNuevo.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnNuevoActionPerformed(evt);
            }
        });

        btnEditar.setText("EDITAR");
        btnEditar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnEditarActionPerformed(evt);
            }
        });

        btnEliminar.setText("ELIMINAR");
        btnEliminar.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                btnEliminarActionPerformed(evt);
            }
        });

        javax.swing.GroupLayout jPanelVPLayout = new javax.swing.GroupLayout(jPanelVP);
        jPanelVP.setLayout(jPanelVPLayout);
        jPanelVPLayout.setHorizontalGroup(
            jPanelVPLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(lblTitulo, javax.swing.GroupLayout.DEFAULT_SIZE, 519, Short.MAX_VALUE)
            .addGroup(jPanelVPLayout.createSequentialGroup()
                .addGap(24, 24, 24)
                .addGroup(jPanelVPLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(jPanelVPLayout.createSequentialGroup()
                        .addGroup(jPanelVPLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                            .addGroup(jPanelVPLayout.createSequentialGroup()
                                .addComponent(lblNombre)
                                .addGap(18, 18, 18)
                                .addGroup(jPanelVPLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                                    .addComponent(lblIdCliente)
                                    .addComponent(lblNombreCliente)))
                            .addGroup(jPanelVPLayout.createSequentialGroup()
                                .addComponent(lblDireccion)
                                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                                .addComponent(lblDireccionCliente)))
                        .addGap(0, 0, Short.MAX_VALUE))
                    .addGroup(jPanelVPLayout.createSequentialGroup()
                        .addComponent(lblId)
                        .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))))
            .addGroup(jPanelVPLayout.createSequentialGroup()
                .addContainerGap()
                .addComponent(btnPrimero, javax.swing.GroupLayout.PREFERRED_SIZE, 50, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(btnAnterior, javax.swing.GroupLayout.PREFERRED_SIZE, 50, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(btnSiguiente, javax.swing.GroupLayout.PREFERRED_SIZE, 50, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(btnUltimo, javax.swing.GroupLayout.PREFERRED_SIZE, 50, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addGap(50, 50, 50)
                .addComponent(btnNuevo)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(btnEditar)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(btnEliminar)
                .addGap(0, 0, Short.MAX_VALUE))
        );
        jPanelVPLayout.setVerticalGroup(
            jPanelVPLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(jPanelVPLayout.createSequentialGroup()
                .addComponent(lblTitulo, javax.swing.GroupLayout.PREFERRED_SIZE, 55, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addGroup(jPanelVPLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(btnPrimero)
                    .addComponent(btnAnterior)
                    .addComponent(btnSiguiente)
                    .addComponent(btnUltimo)
                    .addComponent(btnNuevo)
                    .addComponent(btnEditar)
                    .addComponent(btnEliminar))
                .addGap(24, 24, 24)
                .addGroup(jPanelVPLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lblId)
                    .addComponent(lblIdCliente))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jPanelVPLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lblNombre)
                    .addComponent(lblNombreCliente))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                .addGroup(jPanelVPLayout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(lblDireccion)
                    .addComponent(lblDireccionCliente))
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jPanelVP, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addComponent(jPanelVP, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addContainerGap(javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void formWindowClosed(java.awt.event.WindowEvent evt) {//GEN-FIRST:event_formWindowClosed

        // Cerramos el ResultSet de clientes
        try {
            rsClientes.close();
        } catch (SQLException ex) {
            ex.printStackTrace();
        }

        // Cerramos la conexión a la base de datos
        DBManager.close();
    }//GEN-LAST:event_formWindowClosed

    private void btnPrimeroActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnPrimeroActionPerformed
        muestraClientePrimero();
    }//GEN-LAST:event_btnPrimeroActionPerformed

    private void btnAnteriorActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnAnteriorActionPerformed
        muestraClienteAnterior();
    }//GEN-LAST:event_btnAnteriorActionPerformed

    private void btnSiguienteActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnSiguienteActionPerformed
        muestraClienteSiguiente();
    }//GEN-LAST:event_btnSiguienteActionPerformed

    private void btnUltimoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnUltimoActionPerformed
        muestraClienteUltimo();
    }//GEN-LAST:event_btnUltimoActionPerformed

    // Pide los clientes a la base de datos y los guarda en ResultSet rsClientes
    private void obtenerClientes() {
        try {
            // Cerramos el ResultSet actual
            if (rsClientes != null) {
                rsClientes.close();
            }

            // Pedimos la tabla clientes a la base de datos
            rsClientes = DBManager.getTablaClientes(ResultSet.TYPE_SCROLL_SENSITIVE, ResultSet.CONCUR_UPDATABLE);

            // Movemos cursor al primero
            clienteValido = rsClientes.first();

        } catch (SQLException ex) {
            ex.printStackTrace();
        }
    }

    private void muestraClientePrimero() {
        try {
            clienteValido = rsClientes.first();
            muestraDatosCliente();
        } catch (SQLException ex) {
            muestraVentanaErrorSQL(ex);
        } catch (Exception ex) {
            muestraVentanaError(ex);
        }
    }

    private void muestraClienteAnterior() {
        try {
            if (!rsClientes.isFirst()) {
                clienteValido = rsClientes.previous();
                muestraDatosCliente();
            }
        } catch (SQLException ex) {
            muestraVentanaErrorSQL(ex);
        } catch (Exception ex) {
            muestraVentanaError(ex);
        }
    }

    private void muestraClienteSiguiente() {
        try {
            if (!rsClientes.isLast()) {
                clienteValido = rsClientes.next();
                muestraDatosCliente();
            }
        } catch (SQLException ex) {
            muestraVentanaErrorSQL(ex);
        } catch (Exception ex) {
            muestraVentanaError(ex);
        }
    }

    private void muestraClienteUltimo() {
        try {
            clienteValido = rsClientes.last();
            muestraDatosCliente();
        } catch (SQLException ex) {
            muestraVentanaErrorSQL(ex);
        } catch (Exception ex) {
            muestraVentanaError(ex);
        }
    }

    // Muestra en los componentes los datos del cliente al que apunta el cursor de rsclientes
    private void muestraDatosCliente() {

        int id = 0;
        String nombre = "";
        String direccion = "";

        // Obtenemos los datos del cliente actual (si es válido)
        if (clienteValido) {
            try {
                id = rsClientes.getInt("id");
                nombre = rsClientes.getString("nombre");
                direccion = rsClientes.getString("direccion");

            } catch (SQLException ex) {
                muestraVentanaError(ex);
            }
        }

        // Mostramos datos en la ventana
        lblIdCliente.setText("" + id);
        lblNombreCliente.setText(nombre);
        lblDireccionCliente.setText(direccion);
    }

    private void btnEditarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnEditarActionPerformed

        if (!clienteValido) {
            muestraVentanaAviso("No se puede editar el cliente.\n¿Es posible que no haya clientes?");
        } else {

            try {
                // Obtenemos los datos del cliente actual
                int id = rsClientes.getInt("id");
                lblVECIdCliente.setText("" + id);
                String nombre = rsClientes.getString("nombre");
                txtVECNombre.setText(nombre);
                String direccion = rsClientes.getString("direccion");
                txtVECDireccion.setText(direccion);

                // Ocultamos ventana principal
                this.setVisible(false);

                // Mostramos ventana de editar cliente
                jfEditarCliente.setVisible(true);

            } catch (SQLException ex) {
                muestraVentanaError(ex);
            }
        }
    }//GEN-LAST:event_btnEditarActionPerformed

    private void btnEliminarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnEliminarActionPerformed

        if (!clienteValido) {
            muestraVentanaAviso("No se puede eliminar el cliente.\n¿Es posible que no haya clientes?");
        } else {
            // Ventana para que el usuario confirme
            boolean aceptado = muestraVentanaAceptarCancelar("¿Está seguro de que desea eliminar el cliente?");

            // Si respondió que sí, eliminamos el cliente y actualizamos datos
            if (aceptado) {
                try {
                    // Eliminamos el cliente actual
                    int id = Integer.parseInt(lblIdCliente.getText());
                    DBManager.deleteCliente(id);

                    // Actualizamos datos de clientes
                    obtenerClientes();
                    muestraDatosCliente();
                } catch (Exception ex) {
                    muestraVentanaError(ex);
                }
            }
        }

    }//GEN-LAST:event_btnEliminarActionPerformed

    private void btnNuevoActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnNuevoActionPerformed
        // Ocultamos ventana principal
        this.setVisible(false);

        // Mostramos ventana de nuevo cliente con campos vacíos
        txtVNCNombre.setText("");
        txtVNCDireccion.setText("");
        jfNuevoCliente.setVisible(true);
    }//GEN-LAST:event_btnNuevoActionPerformed

    private void btnVNCAceptarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnVNCAceptarActionPerformed
        // Registramos nuevo cliente en la base de datos
        String nombre = txtVNCNombre.getText();
        String direccion = txtVNCDireccion.getText();
        DBManager.insertCliente(nombre, direccion);

        // Ocultamos ventana de nuevo cliente y mostramos ventana principal
        jfNuevoCliente.setVisible(false);
        this.setVisible(true);

        // Actualizamos datos y mostramos el último
        obtenerClientes();
        muestraClienteUltimo();
    }//GEN-LAST:event_btnVNCAceptarActionPerformed

    private void btnVNCCancelarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnVNCCancelarActionPerformed
        jfNuevoCliente.setVisible(false);
        this.setVisible(true);
    }//GEN-LAST:event_btnVNCCancelarActionPerformed

    private void btnVECAceptarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnVECAceptarActionPerformed
        // Registramos nuevo cliente en la base de datos
        int id = Integer.parseInt(lblVECIdCliente.getText());
        String nombre = txtVECNombre.getText();
        String direccion = txtVECDireccion.getText();
        DBManager.updateCliente(id, nombre, direccion);

        // Ocultamos ventana de nuevo cliente y mostramos ventana principal
        jfEditarCliente.setVisible(false);
        this.setVisible(true);

        // Actualizamos datos y mostramos el último
        obtenerClientes();
        muestraClientePrimero();
    }//GEN-LAST:event_btnVECAceptarActionPerformed

    private void btnVECCancelarActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_btnVECCancelarActionPerformed
        jfEditarCliente.setVisible(false);
        this.setVisible(true);
    }//GEN-LAST:event_btnVECCancelarActionPerformed

    // Muestra una ventana de error tipo SQLException
    private void muestraVentanaErrorSQL(SQLException ex) {
        ex.printStackTrace();
        JOptionPane.showMessageDialog(this, "Error SQL:\n" + ex.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
    }

    // Muestra una ventana de error tipo Exception
    private void muestraVentanaError(Exception ex) {
        ex.printStackTrace();
        JOptionPane.showMessageDialog(this, "Error inesperado:\n" + ex.getMessage(), "Error", JOptionPane.ERROR_MESSAGE);
    }
    
    // Muestra una ventana de aviso con el mensaje indicado
    private void muestraVentanaAviso(String mensaje) {
        JOptionPane.showMessageDialog(this, mensaje, "Aviso", JOptionPane.WARNING_MESSAGE);
    }
    
    // Muestra una ventana de aceptar/cancelar y devuelve true si le dió a aceptar
    private boolean muestraVentanaAceptarCancelar(String mensaje) {
        int result = JOptionPane.showConfirmDialog(this, mensaje, "Confirme la acción", JOptionPane.OK_CANCEL_OPTION);
        return (result == 0);
    }

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
            java.util.logging.Logger.getLogger(GestionClientesIGU.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(GestionClientesIGU.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(GestionClientesIGU.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(GestionClientesIGU.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>
        //</editor-fold>

        /* Create and display the form */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                new GestionClientesIGU().setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JButton btnAnterior;
    private javax.swing.JButton btnEditar;
    private javax.swing.JButton btnEliminar;
    private javax.swing.JButton btnNuevo;
    private javax.swing.JButton btnPrimero;
    private javax.swing.JButton btnSiguiente;
    private javax.swing.JButton btnUltimo;
    private javax.swing.JButton btnVECAceptar;
    private javax.swing.JButton btnVECCancelar;
    private javax.swing.JButton btnVNCAceptar;
    private javax.swing.JButton btnVNCCancelar;
    private javax.swing.JPanel jPanelVP;
    private javax.swing.JFrame jfEditarCliente;
    private javax.swing.JFrame jfNuevoCliente;
    private javax.swing.JPanel jpVEC;
    private javax.swing.JPanel jpVNC;
    private javax.swing.JLabel lblDireccion;
    private javax.swing.JLabel lblDireccionCliente;
    private javax.swing.JLabel lblId;
    private javax.swing.JLabel lblIdCliente;
    private javax.swing.JLabel lblNombre;
    private javax.swing.JLabel lblNombreCliente;
    private javax.swing.JLabel lblTitulo;
    private javax.swing.JLabel lblVECDireccion;
    private javax.swing.JLabel lblVECId;
    private javax.swing.JLabel lblVECIdCliente;
    private javax.swing.JLabel lblVECNombre;
    private javax.swing.JLabel lblVECTitulo;
    private javax.swing.JLabel lblVNCDireccion;
    private javax.swing.JLabel lblVNCNombre;
    private javax.swing.JLabel lblVNCTitulo;
    private javax.swing.JTextField txtVECDireccion;
    private javax.swing.JTextField txtVECNombre;
    private javax.swing.JTextField txtVNCDireccion;
    private javax.swing.JTextField txtVNCNombre;
    // End of variables declaration//GEN-END:variables
}
