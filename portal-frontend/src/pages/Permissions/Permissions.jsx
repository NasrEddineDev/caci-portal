import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import axiosClient from "../../axios-client";
import { useStateContext } from "../../contexts/ContextProvider";

export default function Permissions() {
  const [permissions, setPermissions] = useState([])
  const [loading, setLoading] = useState(false)
  const {setNotification} = useStateContext()

  useEffect(() => {
    getPermissions();
  }, [])

  const onDelete = (permission) => {
    if (!window.confirm("Are you sure you want to delete this permission?")) {
      return;
    }
    axiosClient.delete(`/v1/permissions/${permission.id}`)
      .then(res => {
        setNotification("Permission successfully deleted")
        getPermissions();
      })
      .catch(err => console.log(err));
  }

  const getPermissions = () => {
    setLoading(true)
    axiosClient.get('/v1/permissions')
      .then(({ data }) => {
        console.log(data)
        setPermissions(data.data)
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
              <h4 className="card-title">List Permissions</h4>
              {/* <h6 className="card-subtitle">Permissions</h6> */}
              <Link to="/permissions/new"><button className="btn btn-success">Add New Permission</button></Link>
            </div>
            <div className="table-responsive">
              <table id="zero_config" className="table table-striped table-bordered no-wrap">


                {/* <div>
                          <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center" }}>
                            <h1>List Permissions</h1>
                            <Link to="/permissions/new"><button className="btn btn-success">Add New Permission</button></Link>
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
                    <th scope="col">Group</th>
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
                    {permissions.map((permission, index) => (
                      <tr key={index}>
                        <th scope="row">{index + 1}</th>
                        <td>{permission.id}</td>
                        <td>{permission.name}</td>
                        <td>{permission.description}</td>
                        <td>{permission.group}</td>
                        <td>
                          <Link to={`/permissions/${permission.id}`}>
                            <button className="btn btn-primary">Edit</button>
                          </Link>
                          &nbsp;
                          <button className="btn btn-danger" onClick={ev => onDelete(permission)}>Delete</button>
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