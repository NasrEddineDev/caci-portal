import { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import axiosClient from "../../axios-client";

export default function Users() {
  const [users, setUsers] = useState([]);
  const [loading, setLoading] = useState(false);

  useEffect(() => {
    getUsers();
  }, [])

  const onDelete = (user) => {
    if (!window.confirm("Are you sure you want to delete this user?")) {
      return;
    }
    axiosClient.delete(`/users/${user.id}`)
      .then(res => {
        //TODO: Show notification
        getUsers();
      })
      .catch(err => console.log(err));
  }

  const getUsers = () => {
    setLoading(true)
    axiosClient.get('/users')
      .then(({ data }) => {
        console.log(data)
        setUsers(data.data)
        setLoading(false)
      })
      .catch(err => {
        console.log(err)
      })
  }

  return (
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div style={{ display: "flex", justifyContent: "space-between", alignItems: "center", margin: "7px" }}>
              <h4 class="card-title">List Users</h4>
              {/* <h6 class="card-subtitle">Users</h6> */}
              <Link to="/users/new"><button className="btn btn-success">Add New User</button></Link>
            </div>
            <div class="table-responsive">
              <table id="zero_config" class="table table-striped table-bordered no-wrap">


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
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
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
                    {users.map((user, index) => (
                      <tr key={index}>
                        <th scope="row">{index + 1}</th>
                        <td>{user.id}</td>
                        <td>{user.name}</td>
                        <td>{user.email}</td>
                        <td>{user.role}</td>
                        <td>
                          <Link to={`/users/${user.id}`}>
                            <button className="btn btn-primary">Edit</button>
                          </Link>
                          &nbsp;
                          <button className="btn btn-danger" onClick={ev => onDelete(user)}>Delete</button>
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