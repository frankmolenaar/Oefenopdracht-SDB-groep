using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;
using WebApplication2.Models;

namespace WebApplication2.Controllers
{
    public class kalender_afspraak_delete : Controller
    {
        public ActionResult DeleteAfspraak()
        {
            int afspraakId = Convert.ToInt32(Request.Form["afspraakid"]);
            Afspraak afspraak = new Afspraak(afspraakId);
            afspraak.deleteAfspraak();

            ViewData["Message"] = "Delete afspraak complete!";
            return View();
        }
    }
}