﻿using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using WebApplication2.Models;

namespace WebApplication2.Controllers
{
    public class kalender_afspraak_insert : Controller
    {
        public ActionResult InsertAfspraak()
        {
            ViewData["Message"] = "Insert afspraak complete!";
            return View();
        }
    }
}



