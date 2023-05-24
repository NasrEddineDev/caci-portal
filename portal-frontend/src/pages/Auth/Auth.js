
import jwtDecode from 'jwt-decode'

// export const isAuthenticated = user => !!user;
function isAuthenticated(){
    const token = window.localStorage.getItem("ACCESS_TOKEN");

    if (token){
        const {expiration} = jwtDecode(token)
        if (expiration * 60 > new Date().getTime()){
            return true;
        }
    }
    return false;
}

export const isAllowed = (user, rights) =>
    rights.some(right => user.rights.includes(right));

    export const hasRole = (user, roles) =>
    roles.some(role => user.roles.includes(role));