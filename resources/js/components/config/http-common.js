export const getUser = () => {
    const userStr = localStorage.getItem('getuser');
    if (userStr)
        return JSON.parse(userStr)
    else return null;
}

export const token = () => {
    return localStorage.getItem('token') || null
}

export const remmoveUserSession = () => {
    localStorage.removeItem('token');
    localStorage.removeItem('getuser');
}

export const setUserSession = (token, users) => {
    // console.log(token, users);
    localStorage.setItem('token', token);
    localStorage.setItem('getuser', JSON.stringify(users));
}
