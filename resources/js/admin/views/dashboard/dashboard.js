export default {
    data() {
        return {
            menu_items: [
                {
                    name: 'Sistema',
                    icon: 'fas fa-cog',
                    show: false,
                    group: [
                        { name: 'Usuarios', path: '/' },
                        { name: 'Roles', path: '/' },
                        { name: 'Permisos', path: '/' }
                    ]
                },
                { name: 'Clientes', icon: 'fas fa-handshake', path: '/' },
                { name: 'Doctores', icon: 'fas fa-user-md', path: '/' },
                { name: 'Monitor de ventas', icon: 'fas fa-desktop', path: '/monitor-de-ventas' },
                {
                    name: 'Reportes',
                    icon: 'fas fa-file',
                    show: false,
                    group: [
                        { name: 'Historial de pagos', path: '/' },
                        { name: 'Estatus Cliente', path: '/' },
                        { name: 'Cartera Vencida', path: '/' }
                    ]
                },
            ],
        }
    },
    methods: {
        goTo(route) {
            if(route != undefined) {
                this.$router.push(route)
            }

        }
    }
}
