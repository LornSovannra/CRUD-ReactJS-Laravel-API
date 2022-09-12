import React, { useEffect, useState } from 'react'
import axios from 'axios';
import { Redirect, Switch } from 'react-router';

export default function Post() {
    const [title, setTitle] = useState('')
    const [description, setDescription] = useState('')

    const data = {
        title: title,
        description: description
    }

    const PostHandler = () => {
        axios.post('http://127.0.0.1:8000/api/upload', data)
            .then(res => alert("Post Uploaded."))
    }

    return (
        <div style={{display: 'flex', flexDirection: 'column', maxWidth: 500, margin: "0 auto"}}>
            <input type="text" placeholder="Title" value={title} onChange={(text) => setTitle(text.target.value)} />
            <hr />
            <textarea id="" cols="30" rows="10" placeholder="Description" value={description} onChange={(text) => setDescription(text.target.value)}></textarea>
            <hr />
            <button onClick={PostHandler}>Post</button>
        </div>
    )
}