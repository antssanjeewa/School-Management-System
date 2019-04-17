
export const set_dialog = (state) => {
    return state.dialog = !state.dialog
}

export const set_all_class_rooms = (state, classes) => {
    return state.allClassRoom = classes
}

// set update class_room to form
export const set_update_class_room_to_form = (state, class_room) => {
    return state.editClassRoom = class_room
}

