export default {
    data() {
        return {
            menu_items: [
                {
                    name: 'Sistema',
                    icon: 'fas fa-cog',
                    group: [
                        { name: 'Usuarios' },
                        { name: 'Roles' },
                        { name: 'Permisos' }
                    ]
                },
                { name: 'Clientes', icon: 'fas fa-handshake', },
                { name: 'Doctores', icon: 'fas fa-user-md',},
                { name: 'Monitor de ventas', icon: 'fas fa-desktop' },
                {
                    name: 'Reportes',  icon: 'fas fa-file',
                    group: [
                        { name: 'Historial de pagos' },
                        { name: 'Estatus Cliente' },
                        { name: 'Cartera Vencida' }
                    ]
                },
            ],
        }
    }
}
