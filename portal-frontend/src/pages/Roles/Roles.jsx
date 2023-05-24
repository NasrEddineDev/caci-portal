import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import axiosClient from "../../axios-client";
import { useStateContext } from "../../contexts/ContextProvider";

export default function Roles() {
  const [roles, setRoles] = useState([])
  const [loading, setLoading] = useState(false)
  const {setNotification} = useStateContext()

  useEffect(() => {
    getRoles();
  }, [])

  const onDelete = (role) => {
    if (!window.confirm("Are you sure you want to delete this role?")) {
      return;
    }
    axiosClient.delete(`/v1/roles/${role.id}`)
      .then(res => {
        setNotification("Role successfully deleted")
        getRoles();
      })
      .catch(err => console.log(err));
  }

  const getRoles = () => {
    setLoading(true)
    axiosClient.get('/v1/roles')
      .then(({ data }) => {
        console.log(data)
        setRoles(data.data)
        setLoading(false)
      })
      .catch(err => {
        console.log(err)
      })
  }

  return (
    <div className="row">
      <div className="col-12">
        <div className="card">
          <div className="card-body">
            <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center", margin: "7px" }}>
              <h4 className="card-title">List Roles</h4>
              {/* <h6 className="card-subtitle">Users</h6> */}
              <Link to="/roles/new"><button className="btn btn-success">Add New Roles</button></Link>
            </div>
            <div className="table-responsive">
              <table id="zero_config" className="table table-striped table-bordered no-wrap">


                {/* <div>
                          <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center" }}>
                            <h1>List Users</h1>
                            <Link to="/users/new"><button className="btn btn-success">Add New User</button></Link>
                            {loading && <p>Loading...</p>}
                          </div>
                          <div className="card animated fadeInDown">
                            <table className="table table-striped"> */}
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                {loading &&
                  <tbody>
                    <tr>
                      <td colSpan={6} className="text-center">Loading ...</td>
                    </tr>
                  </tbody>
                }
                {!loading &&
                  <tbody>
                    {roles.map((role, index) => (
                      <tr key={index}>
                        <th scope="row">{index + 1}</th>
                        <td>{role.id}</td>
                        <td>{role.name}</td>
                        <td>{role.description}</td>
                        <td>
                          <Link to={`/roles/${role.id}`}>
                            <button className="btn btn-primary">Edit</button>
                          </Link>
                          &nbsp;
                          <button className="btn btn-danger" onClick={ev => onDelete(role)}>Delete</button>
                        </td>
                      </tr>
                    ))}
                  </tbody>
                }
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  )
}