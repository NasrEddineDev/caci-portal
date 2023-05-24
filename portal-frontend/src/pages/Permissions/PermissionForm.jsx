import { useEffect, useRef, useState } from "react"
import { useNavigate, useParams } from "react-router-dom"
import axiosClient from "../../axios-client"
import { useStateContext } from "../../contexts/ContextProvider"
import { isAllowed } from "../Auth/Auth"

export default function PermissionForm() {
  const { id } = useParams()
  const navigate = useNavigate()
  const [loading, setLoading] = useState()
  const {setNotification} = useStateContext()
  const [errors, setErrors] = useState()
  const passwordRef = useRef();
  const passwordConfirmationRef = useRef();
  const [permission, setPermission] = useState({
    id: null,
    name: "",
    email: "",
    password: "",
    // password_confirmation: ""
  })
  if (id) {
    useEffect(() => {
      setLoading(true)
      axiosClient.get('/v1/permissions/' + id)
        .then(response => {
          setLoading(false)
          setPermission(response.data)
          console.log(permission)
        })
        .catch(error => {
          setLoading(false)
          console.log(error)
        })
    }, [])
  }

  const onSubmit = (e) => {
    e.preventDefault()
    setLoading(true)
    if (permission.id) {
      if (!passwordRef.current.value) permission['password'] = undefined
      // permission.password = passwordRef.current.value
      // permission.password_confirmation = passwordConfirmationRef.current.value
      axiosClient.put('/v1/permissions/' + permission.id, permission)
      .then(response => {
        setNotification("Permission successfully updated")
          setLoading(false)
          navigate('/permissions')
        })
      .catch(error => {
          setLoading(false)
          const response = error.response;
          if (response && response.status === 422) { 
           setErrors(response.data.errors);
            console.log(response.data);
          }    
        })
    }
    else {
      axiosClient.post('/v1/permissions', permission)
     .then(response => {
      setNotification("Permission successfully created")
        setLoading(false)
        navigate('/permissions')
      })
      .catch(error => {
          setLoading(false)
          const response = error.response;
          if (response && response.status === 422) { 
           setErrors(response.data.errors);
            console.log(response.data);
          }
        })
    }
  }
  return (
    <div>Permission Form
      {permission.id && <h1>Update Permission: {permission.name}</h1>}
      {!permission.id && <h1>New Permission</h1>}
      {loading && <div className="text-center">Loading ...</div>}
      <p className="text-center">
        {
          errors && <div className="badge-danger">
            {Object.keys(errors).map(key => (
              <p key={key}>{errors[key][0]}</p>
            ))}
          </div>
        }
      </p>

      {errors && <p className="text-center"><div className="badge-danger">
        {Object.keys(errors).map(key => (
          <p key={key}>{errors[key][0]}</p>
        ))}
      </div></p>
      }
      {!loading &&
        <form onSubmit={onSubmit}>
          <input value={permission.name} onChange={(e) => setPermission({...permission, name: e.target.value})} placeholder="Name" type="text" />
          <input value={permission.email} onChange={(e) => setPermission({...permission, email:e.target.value})} placeholder="Email" type="email" />
          <input type="password" ref={passwordRef} onChange={(e) => setPermission({...permission, password:e.target.value})} placeholder="Password" />
          <input type="password" ref={passwordConfirmationRef} onChange={(e) => setPermission({...permission, password_confirmation:e.target.value})} placeholder="Password Confirmation" />
          {/* {isAllowed(permission, 'permission', ['store_role']) &&  <input type="text" ref={roleRef} onChange={(e) => setPermission({...permission, role:e.target.value})} placeholder="Role" /> } */}
          {isAllowed(permission, ['store_role']) &&  <input type="text" ref={roleRef} onChange={(e) => setPermission({...permission, role:e.target.value})} placeholder="Role" /> }
          <button className="btn">Save</button>
        </form>
      }

    </div>

  )
}