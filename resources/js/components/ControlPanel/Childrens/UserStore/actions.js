// get all users in database
export const set_users = ({commit}) => {
    return new Promise((resolve, reject) => {
        axios.get('api/users').then(response => {
            // http success, call the mutator and change something in state
            commit('set_all_users', response.data.data)
            resolve(response);  // Let the calling function know that http is done. You may send some data back
        }, error => {
            // http failed, let the calling function know that action did not work out
            reject(error);
        })
    })
}

// add new user to the database
export const add_new_user = ({dispatch}, user) => {
    return axios.post('api/users',user) .then( response => {
            dispatch('set_message',{message:response.data.message, type:'success'},{root:true})
            dispatch('set_users')
        }).catch(error => {
            dispatch('set_message',{message:error.response.data.message, type:'error'},{root:true})
        });
}

// set edit user array
export const set_edit_user = ({commit}, user={}) => {

    return commit('set_update_user_to_form',user)
}

// update existing user in database
export const update_user = ({dispatch}, user) => {
    return new Promise((resolve, reject) => {
        axios.post('api/users/update',user).then(response => {
            // http success, call the mutator and change something in state
            dispatch('set_users')
            dispatch('set_message',{message:response.data.message, type:'success'},{root:true})
            resolve(response);  // Let the calling function know that http is done. You may send some data back
        }, error => {
            // http failed, let the calling function know that action did not work out
            dispatch('set_message',{message:error.response.data.message, type:'error'},{root:true})
            reject(error);
        })
    })
}

// set user details
export const set_user_details = ({commit}, id) => {
    return new Promise((resolve, reject) => {
        axios.get('api/users/'+id).then(response => {
            // http success, call the mutator and change something in state
            commit('set_active_user',response.data.user)
            resolve(response);  // Let the calling function know that http is done. You may send some data back
        }, error => {
            // http failed, let the calling function know that action did not work out
            dispatch('set_message',{message:error.response.data.message, type:'error'},{root:true})
            reject(error);
        })
    })
}