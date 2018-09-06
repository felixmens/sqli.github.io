<template>
<div>
        <table class="table table-condensed table-hover">
            <thead class="bg-primary text-light text-center">
                <tr>    
                    <td>ID</td>
                    <td>Service</td>
                </tr>
            </thead>
            <tbody class="text-center">
                <tr v-for="service in services" v-bind:key="service.id">
                    <td>{{service.id}}</td>
                    <td>{{service.text}}</td>
                </tr>
            </tbody>
        </table>
</div>
</template>
<script>
export default {
     data(){
            return{
                services: [],
                service: {
                    id: '',
                    text: ''
                }
            }
    },

    //sort of a constructor function that calls the listUsers method to list all users
        created(){
            this.listServiceData();
        },

        // methods goes in here
         methods:{
            listServiceData(){
                fetch('/api/services')
                //get data as json
                .then(res => res.json())
                .then(res => {
                    this.services = res.data;
                })
                .catch(err => console.log(err));
            }
}
}
</script>
