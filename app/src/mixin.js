
export default {
    methods:{
        moment: function(date){
            return moment.utc(date).format("MMMM DD, YY");
        }
    }

}