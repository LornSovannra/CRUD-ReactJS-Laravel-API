import React, { useEffect, useState } from 'react'
import axios from 'axios';
import { Redirect } from 'react-router';

export default function NewsFeed() {
    const [data, setData] = useState([])

    useEffect(() => {
        axios.get("http://127.0.0.1:8000/api/post")
            .then(response => {
                setData(response.data)
            })
    }, [])

    return (
        <div>
            { data.map(post => {
                return (
                    <div key={post.id}>
                        {/* <p>{ post.title }</p>
                        <img src={ post.image }></img> */}
                        <h3>{ post.id } - { post.title }</h3>
                        <p>{ post.description }</p>
                    </div>
                )
            }) }
        </div>
    )
}