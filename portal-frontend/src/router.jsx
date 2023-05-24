import {createBrowserRouter, Navigate} from "react-router-dom";
import Home from "./pages/Home.jsx";
import Login from "./pages/Auth/Login";
import NotFound from "./pages/NotFound.jsx";
import Signup from "./pages/Auth/Signup.jsx";
import Guest from "./layouts/Guest.jsx";
import Main from "./layouts/Main.jsx";
import Ministry from "./pages/Dashboards/Ministry.jsx";
import Chamber from "./pages/Dashboards/Chamber.jsx";
import Calendar from "./pages/Calendar.jsx";
import EventsList from "./pages/Events/list.jsx";
import Users from "./pages/Users/Users.jsx";
import UserForm from "./pages/Users/UserForm.jsx";
import Roles from "./pages/Roles/Roles.jsx";
import RoleForm from "./pages/Roles/RoleForm.jsx";
import Permissions from "./pages/Permissions/Permissions.jsx";
import PermissionForm from "./pages/Permissions/PermissionForm.jsx";
const router = createBrowserRouter([
    {
        path: "/",
        element: <Main />,
        children: [
            {
                path: "/",
                // element: <Navigate to={Home} />,
                element: <Home />,
            },
            {
                path: "/home",
                element: <Home />,
            },
            {
                path: "/dashboards/ministry",
                element: <Ministry />,
            },
            {
                path: "/dashboards/chamber",
                element: <Chamber />,
            },
            {
                path: "/calendar",
                element: <Calendar />,
            },
            {
                path: "/events",
                element: <EventsList />,
            },
            // Users
            {
                path: "/users",
                element: <Users />,
            },
            {
                path: "/users/new",
                element: <UserForm key="userCreate"/>,
            },
            {
                path: "/users/:id",
                element: <UserForm key="userUpdate"/>,
            },
            // Roles
            {
                path: "/roles",
                element: <Roles />,
            },
            {
                path: "/roles/new",
                element: <RoleForm key="roleCreate"/>,
            },
            {
                path: "/roles/:id",
                element: <RoleForm key="roleUpdate"/>,
            },
            // Permissions
            {
                path: "/permissions",
                element: <Permissions />,
            },
            {
                path: "/permissions/new",
                element: <PermissionForm key="permissionCreate"/>,
            },
            {
                path: "/permissions/:id",
                element: <PermissionForm key="permissionUpdate"/>,
            },
        ]
    },
    {
        path: "/",
        element: <Guest />,
        children: [
            {
                path: "/login",
                element: <Login />,
            },
            {
                path: "/signup",
                element: <Signup />,
            },
        ]
    },
    {
        path: "*",
        element: <NotFound />,
    },
])

export default router;