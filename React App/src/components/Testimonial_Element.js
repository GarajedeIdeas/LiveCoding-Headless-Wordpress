import React, { useState, useEffect } from 'react';

function Testimonial_Element({id_media, title, content}){

  //Obtenemos la imagen a partir de la API con la id_media
    const [url_media, setUrlMedia] =  useState([]);

    useEffect(() => {
        const fetchURLMedia = async () => {
          try {

            //Si no tenemos imagen, la id será 0, podemos poner una por defecto
            if(id_media == 0){    
                id_media = 7;
            }

            const endpoint = 'http://localhost:8888/wp-json/wp/v2/media/' + id_media;
            const response = await fetch(endpoint);
            
            if (response.ok) {
              const data = await response.json();
              setUrlMedia(data);
            } else {
              console.error('Error al obtener los posts:', response.statusText);
            }
          } catch (error) {
            console.error('Error al obtener los posts:', error);
          }
        };
        fetchURLMedia();
      }, []);

    return (
      <div className='Testimonial-Element'>
        <img src={url_media.source_url} className='testimonial-img'/>
        <h2>
             {title}
        </h2>
        <p dangerouslySetInnerHTML={{ __html: content}}/>
      </div>
    );
  }

  export {Testimonial_Element};