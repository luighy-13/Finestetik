export default {
    props:['type', 'icon','func', 'text', 'btn_func'],
    data(){
        return  {
            visible: false,
        }
    },
    methods:{
        geClassButton(){
            var type = (this.type == "") ? "default": this.type;
            
            switch(type){
                case "primary":
                    return "bg-primary"
                break;
                case "danger":
                    return "bg-rose-600 text-white"
                case "default":
                    return "bg-white text-black border"
            }
        },
        async validateUser (){
            var rol_id = this.$auth.user().rol_id
            let uri = '/users/rol/show_rol'
            var response =  (await this.axios.post(uri, {id: rol_id})).data.data

            if(response[this.btn_func] == 1)
            {

                this.func()

            }else {

             this.$notify({
                title: 'Autorización requerida',
                message: 'No cuentas con persmisos para realizar esta acción solicita la autorización',
                type: 'warning'
              });

              setTimeout(()=> {
                this.visible = true
              }, 2000)

            }
        },
        autorización(){

        }
    },
    mounted(){
        console.log(this.type)
    }
}
