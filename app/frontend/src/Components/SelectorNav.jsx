import React from 'react'
import { useRef } from 'react'
import { useContext } from 'react'
import MenuContext from '../Contexts/MenuContext'

function SelectorNav({types}) {

  const {getMenuItems} = useContext(MenuContext)
  const clicked = useRef(0)

  const handleClick = (e)=>{
    const id = e.target.dataset.id
    const slug = e.target.dataset.slug
    clicked.current = parseInt(e.target.id)
    getMenuItems(slug, id)
  }

  return (
    <div className="tm-paging-links">
        <nav>
            <ul>
              {types.map((data, index)=>{
                return (
                  <li className="tm-paging-item" key={index}>
                    <p 
                    className={`tm-paging-link ${clicked.current===index ? 'active' : ''}`}
                    data-id={data.id}
                    data-slug={data.slug}
                    id={index}
                    onClick={handleClick}
                    >{data.name}
                    </p>
                  </li>
                )
              })}
            </ul>
        </nav>
    </div>
  )
}

export default SelectorNav
