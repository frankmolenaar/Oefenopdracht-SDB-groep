using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace WebApplication2.Models
{
    public class Afspraak
    {
        #region Fields              
        
        private Gebruikers gebruikers;
        private Locatie locatie;
        private int begin;
        private int end;
        private int id;

        #endregion
        #region Constructor

        public Afspraak(int newid) 
        {
            id = newid;
        }

        public Afspraak(Gebruikers newGebruikers, Locatie newLocatie, int newBegin, int newEnd, int newid = -1)
        {
            gebruikers = newGebruikers;
            locatie = newLocatie;
            begin = newBegin;
            end = newEnd;
            id = newid;
        }

        #endregion
        #region Properties (Getters & Setters)

        public Gebruikers Gebruikers
        {
            get { return gebruikers; }
            set { gebruikers = value; }
        }

        public Locatie Locatie
        {
            get { return locatie; }
            set { locatie = value; }
        }

        public int Begin
        {
            get { return begin; }
            set { begin = value; }
        }

        public int End
        {
            get { return end; }
            set { end = value; }
        }

        public int Id
        {
            get { return id; }
            set { id = value; }
        }

        #endregion
        #region Methods

        /// <summary>
        /// Voegt de afspraak toe aan de database.
        /// </summary>
        public void insertAfspraak () 
        {            
            string query1 = "INSERT INTO afspraak (locatie_id, begin, end) VALUES("+ locatie.Id + ", " + begin + ", " + end + ")";                                    
            //TODO: QUERY UITVOEREN EN afspraak id ophalen (last insert)
                int lastinsert = 0;
                this.id = lastinsert;

            string query2 = "INSERT INTO koppeltabel (afspraak_id, gebruiker_id) VALUES";                                    
            for (int i = 0; i < gebruikers.AantalGebruikers; id++) 
            {
                Gebruiker gebruiker = gebruikers.getGebruikerAtIndex(i);
                query2 = query2 + " (" + id + ", " + gebruiker.Id + "),";
            }
            query2 = query2.Remove(query2.Length - 1);
            //TODO: QUERY UITVOEREN
        }

        /// <summary>
        /// Verwijdert de afspraak uit de database.
        /// </summary>
        public void deleteAfspraak()
        {
            string query1 = "DELETE FROM aspraak WHERE id=" + id;
            //TODO: QUERY UITVOEREN

            string query2 = "DELETE FROM koppeltabel WHERE afspraak_id=" + id;
            //TODO: QUERY UITVOEREN
        }

        #endregion
     }
}