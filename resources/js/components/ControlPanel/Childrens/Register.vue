<template>
    <v-card>
        <v-toolbar card dark color="primary">
          <v-toolbar-title> {{ formTitle }} Child Register</v-toolbar-title>
            <v-spacer></v-spacer>
            <!-- top add person icon -->
            <v-tooltip bottom>
              <template v-slot:activator="{ on }">
                <v-btn icon large target="_blank" v-on="on" @click="clear">
                  <v-icon large>person_add</v-icon>
                </v-btn>
              </template>
              <span> Add New Child</span>
            </v-tooltip>
            <v-btn icon dark @click="cancel">
              <v-icon>close</v-icon>
            </v-btn>
          </v-toolbar>
        <v-divider></v-divider>
        <v-card-text  class="px-5">
            <!-- <v-container grid-list-sm class="pa-1"> -->
                <v-form ref="form" v-model="valid" lazy-validation>
                  <v-layout>
                    <v-flex xs12>
                      <v-layout row wrap>
                        <!-- -------  Main Information  ------------------------------ -->
                        <v-flex xs12 align-center justify-space-between>
                          <v-layout align-center>
                            <v-avatar size="60px" class="mr-3">
                            <img
                              src="//ssl.gstatic.com/s2/oz/images/sge/grey_silhouette.png"
                              alt=""
                            >
                          </v-avatar>
                          <v-spacer></v-spacer>
                          <v-flex xs12 md4>
                            <v-text-field 
                              name="firstname" 
                              label="First Name" 
                              type="text"
                              :rules="rules.required"
                              v-model="user.firstname"
                            >
                            </v-text-field>
                          </v-flex>
                          <v-flex xs12 md5>
                            <v-text-field 
                              name="lastname" 
                              label="Last Name" 
                              type="text"
                              :rules="rules.required"
                              v-model="user.lastname"
                            >
                            </v-text-field>
                          </v-flex>
                        </v-layout>
                      </v-flex>
          
                      <v-flex xs12 md6>
                        <v-text-field
                          name="mobile01"
                          prepend-icon="smartphone"
                          label="Birth Day"
                          :rules="rules.required"
                          v-model="user.mobile01"
                        ></v-text-field>
                      </v-flex>

                      <v-flex xs6>
                        <v-text-field
                          prepend-icon="mail"
                          label="Gender"
                          v-model="user.email"
                        ></v-text-field>
                      </v-flex>
          
                      <v-flex xs6>
                        <v-text-field
                          prepend-icon="lock"
                          label="Address"
                          type="text"
                          v-model="user.nic"
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs6>
                        <v-text-field
                          prepend-icon="smartphone"
                          label="Class Room"
                          v-model="user.mobile02"
                        ></v-text-field>
                      </v-flex>
                      
                      <v-flex xs6>
                        <v-text-field
                          prepend-icon="phone"
                          label="Parent Name"
                          type ="text"
                          v-model="user.landline"
                        ></v-text-field>
                      </v-flex>
          
                      <v-flex xs6>
                        <v-text-field
                          type="tel"
                          prepend-icon="smartphone"
                          label="Contact Number"
                          mask="phone"
                          v-model="user.mobile02"
                        ></v-text-field>
                      </v-flex>
                      
                    </v-layout>
                  </v-flex>
                </v-layout>
              </v-form>
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions>
            <v-btn flat color="primary" @click="more"> {{ expandText }} </v-btn>
            <v-spacer></v-spacer>
            <v-btn flat @click="cancel">Cancel</v-btn>
            <v-btn :disabled="!valid" flat color="primary" @click="save" @keyup.enter="save">Save</v-btn>
        </v-card-actions>
    </v-card>
</template>

<script>
import { mapActions, mapGetters } from 'vuex'

export default {
  data(){
      return {
          valid : false,
          expand : false,
          formwidth : '900px',
          titles: ['Ven.', 'Mr.', 'Miss.', 'Mrs.'],
          rules : {
            required : [
              v => !!v || 'This field is required',
            ]
          },

          user : {
            firstname : '',
            lastname : '',
            email : '',
            landline : '',
            mobile01 : '',
            mobile02 : '',
            country : 'Sri Lanka',
            address : [{
              'address01' : ''
            }]
          }
      }
  },
  watch: {
      dialog (val) {
        // when dialog value is true, userChange() called
        val && this.userChange()
          
      }
  },
  computed:{
    // Change Form Title name
      formTitle () {
        return this.user.firstname ? 'Edit' : 'Add New'
      },
      ...mapGetters({
        dialog : 'dashboard/getUserForm',
        editUser : 'user/getEditUser'
      }),
      expandText () {
        return this.expand ? '<< Less' : 'More >>'
      }
  },
  methods:{
    ...mapActions({
        toggleForm : 'dashboard/set_toggle_form',
        addUser : 'user/add_new_user',
        updateUser : 'user/update_user',
        updateEditUser : 'user/set_edit_user'
      }),

      // form identify is this 'new user' or 'update user'
      userChange(){
        if(this.editUser.id){
          Object.assign(this.user,this.editUser)
          this.user.firstname = this.user.name.split(' ')[0]
          this.user.lastname = this.user.name.split(' ')[1]
         
        }else{
          this.clear()
        }
        
      },
      // when cancel button click Form is close
      cancel(){
        this.toggleForm('user')
        setTimeout(() => this.clear(), 500);
      },
      // Clear the Form field's
      clear(){
        this.user = { 
          firstname : '',
          lastname : '',
          mobile01 : '',
          country : 'Sri Lanka',
          address : [{
            'address01' : ''
          }]
        },
        this.$refs.form.resetValidation()
        this.updateEditUser(this.user)
      },
      // save the form value's
      save(){
        if (this.$refs.form.validate()) {
          // update exist user
          if(this.user.id){
            this.user.name = this.user.firstname+' '+ this.user.lastname
            //this.updateUser(this.user)
            this.updateUser(this.user).then(response => {
              this.toggleForm('user')
              setTimeout(() => this.clear(), 500);
            }, error => {
                console.error("Got nothing from server. Prompt user to check internet connection and try again")
            })
          // add new user
          }else{
            this.addUser(this.user)
            this.toggleForm('user')
            setTimeout(() => this.clear(), 500);
          }
        }
        
      },
      // form width get full screen 
      more(){
        this.expand = !this.expand
      }
  }
}
</script>

