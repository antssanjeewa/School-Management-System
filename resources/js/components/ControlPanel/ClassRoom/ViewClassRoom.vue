<template>
        <div>
            <v-flex pa-3>
              <v-toolbar flat :color="theme.color.tableHeader">
    
                <!--class_room Table Header Name -->
                <v-toolbar-title>class_rooms Details</v-toolbar-title>
                <v-divider
                  class="mx-2"
                  inset
                  vertical
                ></v-divider>
                <!-- Show total number of class_rooms -->
                <span> Total No of class_rooms : <b> {{ allClassRooms.length }} </b> </span>
                <v-spacer></v-spacer>
    
                <!-- Search bar -->
                <v-text-field
                    v-model="search"
                    append-icon="search"
                    label="Search"
                    single-line
                    hide-details
                ></v-text-field>
    
                <!-- Add new class_room Button -->
                <template>
                    <v-btn :color="theme.color.addNewButton" dark class="ml-5" @click="toggleForm()" >
                      <v-icon medium>add</v-icon>
                       New class_room
                    </v-btn>
                </template>
            </v-toolbar>
    
            <!-- Data table -->
            <v-data-table
                :headers="headers" 
                :items="allClassRooms"
                class="elevation-1"
                :search="search"
                :pagination.sync="pagination"
                :rows-per-page-items="pagination.rowsPerPageItems"
              >
               <!-- table columns -->
                <template v-slot:items="props">
                  <td class="text-xs-left">{{ props.item.id }}</td>
                  <td class="text-xs-left"> {{ props.item.name }}</td>
                  <td class="text-xs-left"> {{ props.item.branch }}</td>
                  <td class="text-xs-left">{{ props.item.acc_number }}</td>
                  <!-- Actions column -->
                  <td class="justify-space-around layout px-0">
    
                    <!-- View Button -->
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon @click="view(props.item.id)">
                              <v-icon large v-on="on" :color="theme.color.viewButton">account_balance</v-icon>
                          </v-btn>
                        </template>
                        <span>View</span>
                    </v-tooltip>
    
                    <!-- Edit Button -->
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon @click="editItem(props.item)">
                              <v-icon large v-on="on" :color="theme.color.editButton">edit</v-icon>
                            </v-btn>
                        </template>
                        <span>Edit</span>
                    </v-tooltip>
                    <!-- Delete Button -->
                    <v-tooltip bottom>
                        <template v-slot:activator="{ on }">
                            <v-btn icon @click="deleteItem(props.item)">
                              <v-icon large v-on="on" :color="theme.color.deleteButton">delete</v-icon>
                            </v-btn>
                        </template>
                        <span>Delete</span>
                    </v-tooltip>
                  </td>
                </template>
    
                <!-- When data loading -->
                <template v-slot:no-data>
                    <v-progress-linear :indeterminate="true"></v-progress-linear>
                </template>
    
              </v-data-table>
            </v-flex>          
        </div>
    </template>
    
    <script>
    import { mapActions,mapGetters } from 'vuex'
        export default {
            data: () => ({
              //pagination bar customized
                pagination: {
                    sortBy: 'name',
                    rowsPerPage: 10,
                    rowsPerPageItems: [5,10,20,50,{"text":"$vuetify.dataIterator.rowsPerPageAll","value":-1}]
                },
                //for search in table 
                search: '',
                //table headers
                headers: [
                    { text: 'Ref.ID',width: '1%', value: 'id' },
                    { text: 'class_room Name', value: 'name'},
                    { text: 'Total Student', value: 'branch'},
                    { text: 'Total Subject', value: 'acc_number' },
                    { text: 'Actions', value: 'name', sortable: false, align:'center' },
    
                ],
            }),
            computed: {
              // get all class_rooms to array
                ...mapGetters({
                    allClassRooms : 'class_room/getAllClassRoom',
                  // Get Theme Data
                    theme : 'getTheme'
                })          
            },
    
            created () {
              // when table is preview, load the all class_rooms from database
              this.$store.dispatch("class_room/get_class_rooms").then(response => {
                // When Success
              }, error => {
                // Get some error
                  console.error(error)
              })
            },
    
            methods: {
              ...mapActions({
                // set class_room details to dialog form when edit
                  updateclass_room : 'dashboard/set_edit_item',
                // toggle dialog form visible & hide
                  toggleForm : 'class_room/set_toggle_form',
                }),
                // When click edit icon
                editItem (item) {
                  this.updateclass_room(item)
                  this.toggleForm()
                },
                // When click view icon 
                view(id){
                  this.$store.state.message = {message:'Access Denied to View', type:'error'}
                  //this.$router.push({ path: `/class_room/${id}`, params: { id: id } })
                },
                // When click Delete icon
                deleteItem(item){
                  confirm('Are you sure you want to delete this item?')  &&
                  this.$store.dispatch("class_room/delete_class_room",item.id).then(response => {
                      const index = this.allClassRooms.indexOf(item)
                      this.allClassRooms.splice(index, 1)
                  }, error => {
    
                  })  
                }
            }
        }
    </script>
    