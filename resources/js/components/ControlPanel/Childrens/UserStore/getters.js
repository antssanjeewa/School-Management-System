import state from "./state";

// get all users array
export const getAllUsers = (state) => {
    return state.allUsers
}

// get edit user
export const getEditUser = (state) => {
    return state.edituser
}