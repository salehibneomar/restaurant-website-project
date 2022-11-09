import { Link, NavLink } from 'react-router-dom'
import React from 'react'

function HeaderNav() {
  return (
    <nav className="col-md-6 col-12 tm-nav">
        <ul className="tm-nav-ul">
            <li className="tm-nav-li">
              <NavLink to="/" className="tm-nav-link">Home</NavLink>
            </li>
            <li className="tm-nav-li">
              <NavLink to="/contact" className="tm-nav-link">Contact</NavLink>
            </li>
        </ul>
    </nav>
  )
}

export default HeaderNav
