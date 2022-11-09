import React from 'react'

function SelectorNav() {
  return (
    <div className="tm-paging-links">
        <nav>
            <ul>
                <li className="tm-paging-item">
                  <p className="tm-paging-link active">Pizza</p>
                </li>
                <li className="tm-paging-item">
                  <p className="tm-paging-link">Salad</p>
                </li>
                <li className="tm-paging-item">
                  <p className="tm-paging-link">Noodle</p>
                </li>
            </ul>
        </nav>
    </div>
  )
}

export default SelectorNav
