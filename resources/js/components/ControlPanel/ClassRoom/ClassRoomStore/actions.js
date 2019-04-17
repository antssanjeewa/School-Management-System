// set form visibility
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
            // http failed, let the calling function know that action did not work out
            reject(error);
        })
    })
}

// add new class room to the database
export const add_new_class_room = ({dispatch}, class_room) => {
    return axios.post('api/class_rooms',class_room) .then( response => {
            dispatch('set_message',{message:response.data.message, type:'success'},{root:true})
            dispatch('set_class_rooms')
        }).catch(error => {
             dispatch('set_message',{message:error.response.data.message, type:'error'},{root:true})
        });
}

// set edit class_room array
export const set_edit_class_room = ({commit}, class_room={}) => {
    return commit('set_update_class_room_to_form',class_room)
}

// update existing class_room in database
export const update_class_room = ({dispatch}, class_room) => {
    return new Promise((resolve, reject) => {
        axios.post('api/class_rooms/update',class_room).then(response => {
            // http success, call the mutator and change something in state
            dispatch('set_class_rooms')
            dispatch('set_message',{message:response.data.message, type:'success'},{root:true})
            resolve(response);  // Let the calling function know that http is done. You may send some data back
        }, error => {
            // http failed, let the calling function know that action did not work out
            dispatch('set_message',{message:error.response.data.message, type:'error'},{root:true})
            reject(error);
            console.log(error.response)
        })
    })
}
