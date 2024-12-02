export const formatTimeToHoursAndMinutes = (time) => {
    const hours = (time / 60);
    const remainderHours = Math.floor(hours);
    const minutes = (hours - remainderHours) * 60
    const remainderMinutes = Math.round(minutes);
    return remainderHours + ' Hours' + ' ' + remainderMinutes + ' Minutes'
}