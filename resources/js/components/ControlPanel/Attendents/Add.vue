<template>
    <v-flex pa-3>
        <v-toolbar flat>
            <v-toolbar-title>Attendant Mark</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-title>{{attendence.class_date}}</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-title>{{ classRoom.name }}</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-toolbar-items class="hidden-sm-and-down">
                <v-btn flat>View Prev</v-btn>
            </v-toolbar-items>
        </v-toolbar>
        <v-flex row>
            <v-flex xs12 sm4 md5>
                <v-menu
                    v-model="d_date"
                    :close-on-content-click="false"
                    :nudge-right="40"
                    lazy
                    transition="scale-transition"
                    offset-y
                    full-width
                    min-width="290px"
                    >
                    <template v-slot:activator="{ on }">
                        <v-text-field
                            v-model="attendence.class_date"
                            label="Donated Date"
                            prepend-icon="event"
                            readonly
                            v-on="on"
                        ></v-text-field>
                    </template>
                    <v-date-picker 
                        v-model="attendence.class_date" 
                        @input="d_date = false"
                    ></v-date-picker>
                </v-menu>
            </v-flex>
            <v-spacer></v-spacer>
            <v-flex xs12 md6>
                <v-select
                    :items="allClasses"
                    item-text ="name"
                    item-value="id"
                    prepend-icon="account_balance"
                    label="Donation Program"
                    v-model="attendence.class_room"
                ></v-select>
            </v-flex>
        </v-flex>
        <v-flex pa-3 v-if="attendence.class_room">
            <v-layout row wrap>
                <v-flex xs12 md3>
                    <v-card  class="pa-3 text-xs-center" color="blue">
                        <h2>Total Childrens :  <b>{{ total_childs }}</b>  </h2>  
                    </v-card>
                </v-flex>
                <v-spacer></v-spacer>
                <v-flex xs3>
                    <v-card  class="pa-3 text-xs-center" color="green">
                        <h2>Present :  <b>00</b> </h2>  
                    </v-card>
                </v-flex>
                <v-spacer></v-spacer>
                <v-flex xs3>
                    <v-card  class="pa-3 text-xs-center" color="orange">
                        <h2>Absent :  <b>00</b> </h2>  
                    </v-card>
                </v-flex>
            </v-layout>
        </v-flex>

        <v-flex>
            <template v-for="item in classRoom.children">
                   <v-card class="pa-2 my-1" row>
                       <v-layout>
                        <v-flex class="pa-3" >
                            {{ item.name }}
                        </v-flex>
                        <v-spacer></v-spacer>
                        <v-btn flat @click="present(item.id)">Present</v-btn>
                        <v-btn flat @click="absent(item.id)">Absent</v-btn>
                    </v-layout>
                   </v-card>
                </template>
        </v-flex>
    </v-flex>
</template>
<script>
    import { mapGetters } from 'vuex'
    export default{
        data : () => ({
            d_date:'',
            total_childs : 0,
            attendence : {
                class_date : new Date().toISOString().substr(0, 10),
                class_room : '',
                present : 0,
                child : ''
            },
            classRoom : {}
        }),
        computed : {
            ...mapGetters({
                allClasses : 'class_room/getAllClassRoom'
            })
        },
        watch: {
            'attendence.class_room' : function (val) {
                this.getChildren(val)
            }
        },
        methods : {
            getChildren($id){
                this.$store.dispatch("class_room/get_class_room",$id).then(response => {
                    this.classRoom = response
                    this.total_childs = response.children.length
                }, error => {
                    console.log('Error')
                })
            },
            present(id){
                console.log(id)
                this.attendence.child = id
                this.attendence.present = 1
                this.$store.dispatch("attendent/add_new_attendent",this.attendence).then(response => {
                    
                }, error => {
                    console.log('Error')
                })
            },
            absent(id){
                this.attendence.child = id
                this.attendence.present = 0
                this.$store.dispatch("attendent/add_new_attendent",this.attendence).then(response => {
                    
                }, error => {
                    console.log('Error')
                })
            }
        }
    }
</script>