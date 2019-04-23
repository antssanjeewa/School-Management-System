<template>
    <div class="container-fluid">
        <admin-board></admin-board>
        <!-- snackbar for show message -->
        <v-snackbar 
            v-model="snackbar" 
            :timeout= "4000" 
            :top= "true" 
            :color="message.type"
            :multi-line= "true"
        >
        {{ message.message }}
        <v-btn color="white" flat @click="snackbar = false" >
            <v-icon>close</v-icon>
        </v-btn>
        </v-snackbar> 
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
import admin from './ControlPanel'
export default {
    data: () => ({
        snackbar: false,
        }),
        props: {
        source: String
        },
        watch : {
            message (val) {
                this.snackbar = true
            }
        },
        computed : {
            ...mapGetters({
                // Get message for Snackbar
                message : 'getMessage',
            })
        },
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
