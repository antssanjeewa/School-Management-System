export const set_toggle_form = ({commit}) => {
    return commit('set_dialog')
}

// get all class_rooms in database
export const set_class_rooms = ({commit}) => {
    return new Promise((resolve, reject) => {
        axios.get('api/class_rooms').then(response => {
            // http success, call the mutator and change something in state
            commit('set_all_class_rooms', response.data.data)
            resolve(response);  // Let the calling function know that http is done. You may send some data back
        }, error => {
            console.log(error.response)
            // http failed, let the calling function know that action did not work out
            reject(error);
        })
    })
}

// add new children to the database
export const add_new_children = ({dispatch}, children) => {
    return axios.post('api/class_rooms',children) .then( response => {
            dispatch('set_message',{message:response.data.message, type:'success'},{root:true})
            dispatch('set_class_rooms')
            console.log("kkk")
            console.log(response)
        }).catch(error => {
            console.log(error.response)
            dispatch('set_message',{message:error.response.data.message, type:'error'},{root:true})
        });
}

// set edit children array
export const set_edit_children = ({commit}, children={}) => {

    return commit('set_update_children_to_form',children)
}

// update existing children in database
export const update_children = ({dispatch}, children) => {
    return new Promise((resolve, reject) => {
        axios.post('api/class_rooms/update',children).then(response => {
            // http success, call the mutator and change something in state
            dispatch('set_class_rooms')
            dispatch('set_message',{message:response.data.message, type:'success'},{root:true})
            resolve(response);  // Let the calling function know that http is done. You may send some data back
        }, error => {
            // http failed, let the calling function know that action did not work out
            dispatch('set_message',{message:error.response.data.message, type:'error'},{root:true})
            reject(error);
        })
    })
}

// set children details
export const set_children_details = ({commit}, id) => {
    return new Promise((resolve, reject) => {
        axios.get('api/class_rooms/'+id).then(response => {
            // http success, call the mutator and change something in state
            commit('set_active_children',response.data.children)
            resolve(response);  // Let the calling function know that http is done. You may send some data back
        }, error => {
            // http failed, let the calling function know that action did not work out
            dispatch('set_message',{message:error.response.data.message, type:'error'},{root:true})
            reject(error);
        })
    })
}