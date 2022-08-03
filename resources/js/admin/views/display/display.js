export default {
    data(){
        return {
            surgeris:[]
        }
    },
    methods: {
        getSurgery(){
            let uri = '/customers/sales', scope = this;
            this.axios.post(uri).then(function(response){
                console.log(response)
                scope.surgeris =  response.data.data
            }).catch(function(response){

            })
        },

    },
    mounted(){
        this.getSurgery()
    }
}
