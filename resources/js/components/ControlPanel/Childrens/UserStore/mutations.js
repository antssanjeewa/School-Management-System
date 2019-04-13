// set all users to the allUsers Array
export const set_all_users = (state, users) => {
    return state.allUsers = users
}

// set update user to form
export const set_update_user_to_form = (state, user) => {
    return state.edituser = user
}

// set active user information
export const set_active_user = (state, user) => {
    //console.log(state.allUsers.find( item => item.id === user.id ) )
    return state.activeUser = user
}
