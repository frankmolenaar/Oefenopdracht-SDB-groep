using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Collections;

namespace WebApplication2.Models
{
    public class Gebruikers
     {
        #region Fields              
        
        private List<Gebruiker> gebruikers;
        private int aantalGebruikers;

        #endregion
        #region Constructor

        public Gebruikers() 
        {
            gebruikers = new List<Gebruiker>();
            aantalGebruikers = 0;
        }

        #endregion
        #region Properties (Getters & Setters)

        public List<Gebruiker> Gebruikers
        {
            get { return gebruikers; }
        }

        public int AantalGebruikers
        {
            get { return aantalGebruikers; }
        }

        #endregion
        #region Methods

        /// <summary>
        /// Voegt een gebruiker toe aan de lijst.
        /// </summary>
        /// <param name="newGebruiker"></param>
        public void addGebruiker (Gebruiker newGebruiker) {
            gebruikers.Add(newGebruiker); 
            aantalGebruikers++;
        }

        /// <summary>
        /// Voegt alle gebruikers uit de array toe aan de lijst.
        /// </summary>
        /// <param name="newGebruikers"></param> array met gebruiker ids.
        public void addGebruikersFromArray(Array newGebruikers)
        {
            foreach (int id in newGebruikers) 
            {
                Gebruiker newGebruiker = new Gebruiker(id);
                gebruikers.Add(newGebruiker);
                aantalGebruikers++;
            }
        }

        /// <summary>
        /// Retourneerd de gebruiker op de opgegeven index uit de lijst
        /// </summary>
        /// <param name="index"></param>
        /// <returns></returns>
        public Gebruiker getGebruikerAtIndex(int index)
        {
            return gebruikers.ElementAt(index);
        }

        #endregion
     }
}