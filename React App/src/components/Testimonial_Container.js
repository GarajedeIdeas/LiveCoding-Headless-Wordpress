import React, { useState, useEffect } from 'react';
import { Testimonial_Element } from './Testimonial_Element';


function Testimonial_Container(){
    const [testimonial, setTestimonial] = useState([]);

    useEffect(() => {
      const fetchTestimonials = async () => {
        try {
          // Realiza una solicitud GET a la API de WordPress
          const response = await fetch('http://localhost:8888/wp-json/wp/v2/testimonios');
          
          // Verifica si la solicitud fue exitosa
          if (response.ok) {
            // Extrae los datos JSON de la respuesta
            const data = await response.json();
            
            // Actualiza el estado de los posts con los datos obtenidos
            setTestimonial(data);
          } else {
            console.error('Error al obtener los posts:', response.statusText);
          }
        } catch (error) {

          console.error('Error al obtener los posts:', error);
        }
      };
      fetchTestimonials();
    }, []); // El segundo argumento de useEffect es un arreglo vacío para que se ejecute solo una vez al montarse el componente
  
    return (
      <section className='Testimonial-Container'>
        {
          testimonial.map(testimonio => (
            <Testimonial_Element key={testimonio.id} id_media={testimonio.featured_media} title={testimonio.title.rendered} content={testimonio.content.rendered}/>
          ))
        }

      </section>
    );
}


export {Testimonial_Container}