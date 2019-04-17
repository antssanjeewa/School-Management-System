<template>
    <v-dialog v-model="dialog" persistent scrollable width="800px">
        <v-card>
        <v-toolbar flat>
            <v-toolbar-title>Add New Class Room</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-sm-and-down">
                <v-btn flat>View Class</v-btn>
            </v-toolbar-items>
        </v-toolbar>
        <v-card-text  class="px-5">
        <v-form ref="form" v-model="valid" lazy-validation @submit.prevent="save">
            <v-flex row>
                <v-flex xs12 md6>
                    <v-text-field
                        name="mobile01"
                        prepend-icon="smartphone"
                        label="Class Name"
                        :rules="rules.required"
                    ></v-text-field>
                </v-flex>
            </v-flex>
        </v-form>   
        </v-card-text>
        <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn flat @click="cancel">Cancel</v-btn>
            <v-btn :disabled="!valid" flat color="primary" @click="save">Save</v-btn>
        </v-card-actions> 
    </v-card>  
    </v-dialog>
</template>
<script>
    import { mapGetters } from 'vuex'
    export default{
        data(){
        return {
            valid : false,
            expand : false,
            // Customized Dialog Form Width
            formwidth : '900px',
            // Validation Rules for Form
            rules : {
              required : [
                v => !!v || 'This field is required',
              ]
            },
            // Default class_room Object
            class_room : {
              name : '',
              branch : '',
              acc_number : ''
            }
        }
    },
    watch: {
        dialog (val) {
          // when open dialog form is true, class_roomChange() called
          val && this.classRoomChange()
            
        }
    },
    computed:{
      // Change Form Title When Edit & Add New
        formTitle () {
          return this.class_room.name ? 'Edit' : 'Add New'
        },
        ...mapGetters({
          // Get Dialog Visibility Value
          dialog : 'class_room/getDialogValue',
          // Get Edit class_room Details
          editclass_room : 'dashboard/getEditItem'
        }),
      // Expand Button Name Change
        expandText () {
          return this.expand ? '<< Less' : 'More >>'
        },
    },
    methods:{
      ...mapActions({
        // Toggle Dialog Form to Show/ Hide
          toggleForm : 'dashboard/set_toggle_form',
        // Add new class_room to database
          addclass_room : 'class_room/add_new_class_room',
        // Update Item Change in State
          updateItem : 'dashboard/set_edit_item',
        }),

        // form identify is this 'new class_room' or 'update class_room'
        classRoomChange(){
          if(this.editclass_room.id){
            Object.assign(this.class_room, this.editclass_room)
          }else{
            this.clear()
          }
          
        },
        // when cancel button click Form is close
        cancel(){
          this.toggleForm('class_room')
          setTimeout(() => this.clear(), 500);
        },
        // Clear the Form field's
        clear(){
          this.class_room = { 
              name : '',
              brach : '',
              acc_number : ''
          }
          this.updateItem(this.class_room)
          this.$refs.form.resetValidation()
        },

        // save the form value's
        save(){
          if (this.$refs.form.validate()) {
            // update exist class_room
            if(this.class_room.id){
              this.$store.dispatch("class_room/update_class_room",this.class_room).then(response => {
                this.toggleForm('class_room')
                setTimeout(() => this.clear(), 500);
              }, error => {})
            
            // add new class_room
            }else{
              this.addclass_room(this.class_room).then(responce =>{
                  this.toggleForm('class_room')
                  setTimeout(() => this.clear(), 500);
              }, error => {}) 
            }
          }
        }
    }
}
</script>