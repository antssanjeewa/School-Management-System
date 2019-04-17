<template>
    <div class="container-fluid">
        <admin-board></admin-board> 
    </div>
</template>

<script>
    import admin from './ControlPanel'
    export default {
        components : {
            'admin-board' : admin
        },
        created(){
          this.$store.dispatch("class_room/set_class_rooms").then(response => {
            
          }, error => {
            
          })
        },
    }
</script>
