using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;

namespace WebApplication2.Models
{
    public class Locatie
    {
        #region Fields              
        
        private int id;
        private String name;

        #endregion
        #region Constructor

        public Locatie() { }

        public Locatie(int newid)
        {
            id = newid;
        }

        public Locatie(int newid, string newname) 
        {
            id = newid;
            name = newname;
        }

        #endregion
        #region Properties (Getters & Setters)

        public String Name 
        { 
            get { return name; } 
            set { name = value; }
        }
        
        public int Id 
        {
            get { return id; }
            set { id = value; }
        }

        #endregion
    }
}