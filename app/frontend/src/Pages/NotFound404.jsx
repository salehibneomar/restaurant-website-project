import React from 'react'
import { useNavigate } from 'react-router-dom'

function NotFound404() {

  const navigate = useNavigate()  

  return (
    <main>
        <header className="row tm-welcome-section">
            <h2 className="col-12 text-center tm-section-title">
                Not Found 404!
            </h2>
            <p className='text-center col-12'>
                The page you are looking for is missing or not found!
                <br /><br />
                <button 
                className='tm-btn'
                onClick={()=>navigate('/')}
                >Go Home</button>
            </p>
        </header>
    </main>
  )
}

export default NotFound404
