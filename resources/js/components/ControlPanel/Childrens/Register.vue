<template>
    <v-dialog v-model="dialog" persistent scrollable :fullscreen="expand" :width="formwidth">
      <v-card>
        <v-toolbar card dark color="primary">
          <v-toolbar-title> {{ formTitle }} Register form</v-toolbar-title>
            <v-spacer></v-spacer>
            <!-- top add person icon -->
            <v-tooltip bottom>
              <template v-slot:activator="{ on }">
                <v-btn icon large target="_blank" v-on="on" @click="clear">
                  <v-icon large>person_add</v-icon>
                </v-btn>
              </template>
              <span> Add New Person</span>
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
                          <v-flex xs2 md1>
                            <v-select
                              :items="titles"
                              label="Title"
                              v-model="user.title"
                            >
                            </v-select>
                          </v-flex>
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
          
                      <v-flex xs1>
          
                      </v-flex>
          
                      <v-flex xs12 md6>
                        <v-text-field
                          type="tel"
                          name="mobile01"
                          prepend-icon="smartphone"
                          label="Mobile 01"
                          mask="phone"
                          :rules="rules.required"
                          v-model="user.mobile01"
                        ></v-text-field>
                      </v-flex>
                  <!-- --------  Other Information  ----------------------------- -->
                      <v-flex xs12>
                        <v-subheader>Other Information</v-subheader>
                        <v-divider></v-divider>
                      </v-flex>
          
                      <v-flex xs6>
                        <v-text-field
                          prepend-icon="mail"
                          label="Email"
                          v-model="user.email"
                        ></v-text-field>
                      </v-flex>
          
                      <v-flex xs6>
                        <v-text-field
                          prepend-icon="lock"
                          label="NIC"
                          type="text"
                          v-model="user.nic"
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs6>
                        <v-text-field
                          prepend-icon="phone"
                          label="Landline"
                          type ="text"
                          mask="phone"
                          v-model="user.landline"
                        ></v-text-field>
                      </v-flex>
          
                      <v-flex xs6>
                        <v-text-field
                          type="tel"
                          prepend-icon="smartphone"
                          label="Mobile 02"
                          mask="phone"
                          v-model="user.mobile02"
                        ></v-text-field>
                      </v-flex>
                      <!-- ------  Address  ------------------------------- -->
                      <v-flex xs12>
                        <v-subheader>Where do you live?</v-subheader>
                        <v-divider></v-divider>
                      </v-flex>
                      <v-flex xs6>
                        <v-text-field
                          prepend-icon="home"
                          label="Address 01"
                          v-model="user.address.address01"
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs6>
                        <v-text-field
                          prepend-icon="place"
                          label="Address 02"
                          v-model="user.address.address02"
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs6>
                        <v-text-field
                          prepend-icon="place"
                          label="City"
                          v-model="user.address.city"
                        ></v-text-field>
                      </v-flex>
                      <!-- Country -->
                      <v-flex xs6>
                        <v-text-field
                          prepend-icon="place"
                          label="Country"
                          v-model="user.country"
                        ></v-text-field>
                      </v-flex>
                    </v-layout>
                  </v-flex>
                  <v-divider class="mx-4" inset vertical v-if="expand"></v-divider>
                  <!-- --------- Expanded Information  ---------------------------- -->
                  <v-flex xs6 v-if="expand">
                    <v-layout row wrap>
                      <v-flex xs12 align-center justify-space-between>
                        <v-flex xs12 md6>
                          <v-text-field 
                            name="info01" 
                            label="Info01" 
                            type="color"
                          >
                          </v-text-field>
                        </v-flex>
                        <v-flex xs12 md6>
                          <v-text-field 
                            name="info02" 
                            label="info02" 
                            type="time"
                          >
                          </v-text-field>
                        </v-flex>
                      </v-flex>
                      <v-flex xs6>
                        <v-text-field
                          type="tel"
                          prepend-icon="smartphone"
                          label="info03"
                        ></v-text-field>
                      </v-flex>
                  <!-- --------  Other Information  ----------------------------- -->
                      <v-flex xs12>
                        <v-subheader>Other Information</v-subheader>
                        <v-divider></v-divider>
                      </v-flex>
          
                      <v-flex xs12>
                        <v-text-field
                          prepend-icon="mail"
                          label="info04"
                        ></v-text-field>
                      </v-flex>
          
                      <v-flex xs12>
                        <v-text-field
                          prepend-icon="lock"
                          label="info06"
                          type="text"
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs12>
                        <v-text-field
                          prepend-icon="phone"
                          label="info07"
                          type ="text"
                        ></v-text-field>
                      </v-flex>
          
                      <v-flex xs12>
                        <v-text-field
                          type="tel"
                          prepend-icon="smartphone"
                          label="info08"
                        ></v-text-field>
                      </v-flex>
                      <!-- ------  Address  ------------------------------- -->
                      <v-flex xs12>
                        <v-subheader>Where do you live?</v-subheader>
                        <v-divider></v-divider>
                      </v-flex>
                      <v-flex xs6>
                        <v-text-field
                          prepend-icon="home"
                          label="Address 01"
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs6>
                        <v-text-field
                          prepend-icon="place"
                          label="Address 02"
                        ></v-text-field>
                      </v-flex>
                      <v-flex xs6>
                        <v-text-field
                          prepend-icon="place"
                          label="City"
                        ></v-text-field>
                      </v-flex>
                    </v-layout>
                  </v-flex>
                </v-layout>
              </v-form>
              <!-- </v-container> -->
        </v-card-text>
        <v-divider></v-divider>
        <v-card-actions>
            <v-btn flat color="primary" @click="more"> {{ expandText }} </v-btn>
            <v-spacer></v-spacer>
            <v-btn flat @click="cancel">Cancel</v-btn>
            <v-btn :disabled="!valid" flat color="primary" @click="save" @keyup.enter="save">Save</v-btn>
        </v-card-actions>
      </v-card>
  </v-dialog>
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

