// set all attend_dates to the allattend_dates Array
export const set_all_attend_dates = (state, attend_dates) => {
    return state.allAttendDates = attend_dates
}

// set update attend_date to form
export const set_update_attend_date_to_form = (state, attend_date) => {
    return state.editAttendDate = attend_date
}