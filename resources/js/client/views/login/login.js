export default {
    data() {
        return {
            email: "",
            password: "",

        };
    },
    methods: {
        login() {
            var app = this;
            this.$auth.login({
                params: {
                    email: app.email,
                    password: app.password
                },
                success: function() {
                },
                error: function() {
                    // this.$notify.error({
                    //     title: 'Error',
                    //     message: 'Las credenciales no son correctas.'
                    //   });
                },
                rememberMe: true,
                redirect: "/",
                fetchUser: true
            });
        },
    },
    mounted() {

    }
};
