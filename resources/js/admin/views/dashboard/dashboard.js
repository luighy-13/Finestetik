export default {
    data() {
        return {
            menu_items: [
                {
                    name: 'Sistema',
                    icon: 'fas fa-cog',
                    show: false,
                    group: [
                        { name: 'Usuarios', path: '/sistema/usuarios' },
                        { name: 'Roles', path: '/sistema/roles' },
                        { name: 'Permisos', path: '/sistema/permisos' }
                    ]
                },
                { name: 'Clientes', icon: 'fas fa-handshake', path: '/clientes' },
                { name: 'Doctores', icon: 'fas fa-user-md', path: '/doctores' },
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
