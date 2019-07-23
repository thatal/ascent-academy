using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Darrang
{
    #region Subjects
    public class Subjects
    {
        #region Member Variables
        protected unknown _id;
        protected string _uuid;
        protected int _stream_id;
        protected string _name;
        protected int _subject_no;
        protected int _is_compulsory;
        protected int _is_major;
        protected unknown _deleted_at;
        protected unknown _created_at;
        protected unknown _updated_at;
        #endregion
        #region Constructors
        public Subjects() { }
        public Subjects(string uuid, int stream_id, string name, int subject_no, int is_compulsory, int is_major, unknown deleted_at, unknown created_at, unknown updated_at)
        {
            this._uuid=uuid;
            this._stream_id=stream_id;
            this._name=name;
            this._subject_no=subject_no;
            this._is_compulsory=is_compulsory;
            this._is_major=is_major;
            this._deleted_at=deleted_at;
            this._created_at=created_at;
            this._updated_at=updated_at;
        }
        #endregion
        #region Public Properties
        public virtual unknown Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Uuid
        {
            get {return _uuid;}
            set {_uuid=value;}
        }
        public virtual int Stream_id
        {
            get {return _stream_id;}
            set {_stream_id=value;}
        }
        public virtual string Name
        {
            get {return _name;}
            set {_name=value;}
        }
        public virtual int Subject_no
        {
            get {return _subject_no;}
            set {_subject_no=value;}
        }
        public virtual int Is_compulsory
        {
            get {return _is_compulsory;}
            set {_is_compulsory=value;}
        }
        public virtual int Is_major
        {
            get {return _is_major;}
            set {_is_major=value;}
        }
        public virtual unknown Deleted_at
        {
            get {return _deleted_at;}
            set {_deleted_at=value;}
        }
        public virtual unknown Created_at
        {
            get {return _created_at;}
            set {_created_at=value;}
        }
        public virtual unknown Updated_at
        {
            get {return _updated_at;}
            set {_updated_at=value;}
        }
        #endregion
    }
    #endregion
}