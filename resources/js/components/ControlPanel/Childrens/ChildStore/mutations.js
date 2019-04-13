// set all childrens to the allchildrens Array
export const set_all_childrens = (state, childrens) => {
    return state.allchildrens = childrens
}

// set update children to form
export const set_update_children_to_form = (state, children) => {
    return state.editchildren = children
}

// set active children information
export const set_active_children = (state, children) => {
    //console.log(state.allchildrens.find( item => item.id === children.id ) )
    return state.activechildren = children
}
