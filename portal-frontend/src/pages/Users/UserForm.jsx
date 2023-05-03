import { useEffect, useRef, useState } from "react"
import { useNavigate, useParams } from "react-router-dom"
import axiosClient from "../../axios-client"

export default function UserForm() {
  const { id } = useParams()
  const navigate = useNavigate()
  const [loading, setLoading] = useState()
  const [errors, setErrors] = useState()
  const passwordRef = useRef();
  const passwordConfirmationRef = useRef();
  const [user, setUser] = useState({
    id: null,
    name: "",
    email: "",
    password: "",
    // password_confirmation: ""
  })
  if (id) {
    useEffect(() => {
      setLoading(true)
      axiosClient.get('/users/' + id)
        .then(response => {
          setLoading(false)
          setUser(response.data)
          console.log(user)
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
    if (user.id) {
      if (!passwordRef.current.value) user['password'] = undefined
      // user.password = passwordRef.current.value
      // user.password_confirmation = passwordConfirmationRef.current.value
      axiosClient.put('/users/' + user.id, user)
      .then(response => {
        // TODO: show notification
          setLoading(false)
          navigate('/users')
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
      axiosClient.post('/users', user)
     .then(response => {
      // TODO: show notification
        setLoading(false)
        navigate('/users')
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
    <div>User Form
      {user.id && <h1>Update User: {user.name}</h1>}
      {!user.id && <h1>New User</h1>}
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
          <input value={user.name} onChange={(e) => setUser({...user, name: e.target.value})} placeholder="Name" type="text" />
          <input value={user.email} onChange={(e) => setUser({...user, email:e.target.value})} placeholder="Email" type="email" />
          <input type="password" ref={passwordRef} onChange={(e) => setUser({...user, password:e.target.value})} placeholder="Password" />
          <input type="password" ref={passwordConfirmationRef} onChange={(e) => setUser({...user, password_confirmation:e.target.value})} placeholder="Password Confirmation" />
          <button className="btn">Save</button>
        </form>
      }

    </div>

  )
}