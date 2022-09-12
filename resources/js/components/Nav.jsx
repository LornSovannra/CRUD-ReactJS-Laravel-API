import React from 'react'
import { Link } from 'react-router-dom'
import styled from 'styled-components'

export default function Nav() {
    const style = {
        color: 'white',
        textDecoration: 'none'
    }

    return (
        <Wrapper style={{background: 'skyblue',}}>
            <Link style={style} to='/'><h1>Logo</h1></Link>
            <ul className="nav-links">
                <Link style={style} to="/"><li>Home</li></Link>
                <Link style={style} to="/post"><li>Post</li></Link>
            </ul>
        </Wrapper>
    )
}

const Wrapper = styled.div`
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 5em;

    ul{
        display: flex;
        list-style: none;

        li{
            padding: 0 1.5em;
        }
    }
`