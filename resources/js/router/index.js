
import Vue from 'vue'
import Router from 'vue-router' 

import Admin from '../components/ControlPanel/DashBoard'
import Childrens from '../components/ControlPanel/Childrens'
// import Setting from '../components/ControlPanel/_Sub/DashBoard/Setting'

import User from '../components/User'
// import donationRecords from '../components/ControlPanel/DonationRecord'
// import donationRecordsAdd from '../components/ControlPanel/DonationRecord/DonationRecordDialog.vue'
// import Bank from '../components/ControlPanel/DashBoard'
// import DonationProgram from '../components/ControlPanel/AdminBoard/DonationProgram'
// import DonationMethod from '../components/ControlPanel/AdminBoard/DonationMethod'
// import DonationPlace from '../components/ControlPanel/AdminBoard/DonationPlace'
// import DonationPlaceName from '../components/ControlPanel/AdminBoard/DonationPlaceName'
// import InformType from '../components/ControlPanel/AdminBoard/InformType'
// import State from '../components/ControlPanel/AdminBoard/State'
// import HowToInteract from '../components/ControlPanel/AdminBoard/HowToInteract'
// import SMNBroadcasting from '../components/ControlPanel/AdminBoard/SMNBroadcasting'
// import District from '../components/ControlPanel/AdminBoard/District'
// import Country from '../components/ControlPanel/AdminBoard/Country'
// import StandingOrder from '../components/ControlPanel/AdminBoard/StandingOrder'
// import Subscription from '../components/ControlPanel/Subscription'

Vue.use(Router)

const routes = [
    { path: '/', component: Admin},
    { path: '/users', component: User},
    { path: '/childs', component: Childrens},
    // { path: '/donation_records', component: donationRecords},
    // { path: '/donation_records/add', component: donationRecordsAdd},
    // { path: '/banks', component: Bank},
    // { path: '/donation_programs', component: DonationProgram},
    // { path: '/donation_methods', component: DonationMethod},
    // { path: '/donation_places', component: DonationPlace},
    // { path: '/donation_place_names', component: DonationPlaceName},
    // { path: '/inform_types', component: InformType},
    // { path: '/states', component: State},
    // { path: '/setting', component: Setting},
    // { path: '/how_to', component:HowToInteract},
    // { path: '/smn_broadcastings', component:SMNBroadcasting},
    // { path: '/districts', component:District},
    // { path: '/countries', component:Country},
    // { path: '/standing_orders', component:StandingOrder},
    // { path: '/subscriptions', component:Subscription},
]

export default new Router({
    // mode: 'history',
    routes
})