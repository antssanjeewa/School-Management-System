// get all attend_dates in database
export const set_attend_dates = ({commit}) => {
    return new Promise((resolve, reject) => {
        axios.get('api/attend_dates').then(response => {
            // http success, call the mutator and change something in state
            commit('set_all_attend_dates', response.data.data)
            resolve(response);  // Let the calling function know that http is done. You may send some data back
        }, error => {
            // http failed, let the calling function know that action did not work out
            reject(error);
        })
    })
}

// add new attend_date to the database
export const add_new_attendent = ({dispatch}, item) => {
    return axios.post('api/attend_dates',item) .then( response => {
            console.log(response)
            dispatch('set_message',{message:response.data.message, type:'success'},{root:true})
        }).catch(error => {
            console.log(error.response)
            dispatch('set_message',{message:error.response.data.message, type:'error'},{root:true})
        });
}

// set edit attend_date array
// export const set_edit_attend_date = ({commit}, attend_date={}) => {

//     return commit('set_update_attend_date_to_form',attend_date)
// }

// // update existing attend_date in database
// export const update_attend_date = ({dispatch}, attend_date) => {
//     return new Promise((resolve, reject) => {
//         axios.post('api/attend_dates/update',attend_date).then(response => {
//             // http success, call the mutator and change something in state
//             dispatch('set_attend_dates')
//             dispatch('set_message',{message:response.data.message, type:'success'},{root:true})
//             resolve(response);  // Let the calling function know that http is done. You may send some data back
//         }, error => {
//             // http failed, let the calling function know that action did not work out
//             dispatch('set_message',{message:error.response.data.message, type:'error'},{root:true})
//             reject(error);
//         })
//     })
// }

// // set attend_date details
// export const set_attend_date_details = ({commit}, id) => {
//     return new Promise((resolve, reject) => {
//         axios.get('api/attend_dates/'+id).then(response => {
//             // http success, call the mutator and change something in state
//             commit('set_active_attend_date',response.data.attend_date)
//             resolve(response);  // Let the calling function know that http is done. You may send some data back
//         }, error => {
//             // http failed, let the calling function know that action did not work out
//             dispatch('set_message',{message:error.response.data.message, type:'error'},{root:true})
//             reject(error);
//         })
//     })
// }