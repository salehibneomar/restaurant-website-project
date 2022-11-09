import React from 'react'

function About({about, loading}) {
  return (
    <header className="row tm-welcome-section">
        <h2 className="col-12 text-center tm-section-title">About Us</h2>
        <p className="col-12 text-center">
          {loading ? 'Loading...' : about}
        </p>
    </header>
  )
}

export default About
